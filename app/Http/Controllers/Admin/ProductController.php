<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();
        return view('admin.product.manage_product', compact('products'));
    }
    public function manage_product()
    {
        $categories = Category::all();
        return view('admin.product.add_product', compact('categories'));
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'details' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'quantity' => 'required',
            'barcode' => 'string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbs.*' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $modal = new Product;
        $modal->name = $request->name;
        $modal->category = $request->category;
        $modal->details = $request->details;
        $modal->price = $request->price;
        $modal->discount_price = $request->discount_price;
        $modal->quantity = $request->quantity;
        $modal->barcode = $request->barcode;
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generate a unique file name
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            // Resize the image (you can adjust the dimensions as needed)
            $img = Image::make($image);

            // Resize the image to fit within a width of 800px, preserving aspect ratio
            $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();  // Prevent upsizing the image
            });

            // Save the resized image to the 'product' directory
            $img->save(public_path('product/' . $imagename));

            // Update the model with the image name
            $modal->image = $imagename;
        }

        if ($request->hasFile('thumbs')) {
            $thumbnails = [];
            foreach ($request->file('thumbs') as $image) {
                $thumbimagename = time() . '.' . $image->getClientOriginalExtension();

                $img = Image::make($image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio(); // Maintain aspect ratio
                });
                // Save the resized image to the 'product' directory
                $img->save(public_path('product/' . $thumbimagename));

                // Update the model with the image name
                $thumbnails[] = $thumbimagename;
            }
        }
        $modal->thumbnail = json_encode($thumbnails);
        $modal->save();
        // $request->session()->flash('message', 'Product Inserted');
        return redirect('admin/product')->with('success', 'Product Added Successfully');
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit_product', compact('product', 'categories'));
    }

    public function update_product(Request $request, $id)
    {
        $modal = Product::find($id);
        $modal->name = $request->post('name');
        $modal->category = $request->post('category');
        $modal->details = $request->post('details');
        $modal->price = $request->post('price');
        $modal->discount_price = $request->post('discount_price');
        $modal->quantity = $request->post('quantity');

        if ($request->hasFile('image')) {
            // Get the old image path and delete it if it exists
            $destination = 'product/' . $modal->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            // Get the new uploaded file
            $file = $request->file('image');

            // Get file extension and generate a new filename
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Create an image instance from the uploaded file
            $img = Image::make($file);

            // Resize the image (adjust width and height as needed)
            $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();  // Prevent upsizing the image
            });

            // Save the resized image to the 'product' folder
            $img->save(public_path('product/' . $filename));

            // Update the model with the new image filename
            $modal->image = $filename;
        }

        if ($request->hasFile('thumbs')) {
            $thumbnails = [];
            foreach ($request->file('thumbs') as $image) {
                $thumbimagename = time() . '.' . $image->getClientOriginalExtension();

                $img = Image::make($image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio(); // Maintain aspect ratio
                });
                // Save the resized image to the 'product' directory
                $img->save(public_path('product/' . $thumbimagename));

                // Update the model with the image name
                $thumbnails[] = $thumbimagename;
            }
        }
        $modal->update();
        //$request->session()->flash('message', 'Product Updated');
        return redirect('admin/product')->with('success', 'Product Updated Successfully');;
    }

    public function printbarcode()
    {
        view()->share(['pageTitle' => 'Products', 'subTitle' => 'Print Barcode']);
        $products = Product::all();
        return view('admin.product.print_barcode', compact('products'));
    }
    public function generateBarcodePdf($ids)
    {
        // Split the ids and quantities (comma separated)
        $items = explode(',', $ids);  // ["1:10", "2:5", "3:7"]

        // Create an array to store parsed data
        $parsedItems = [];

        // Create an array to store the IDs for querying the database
        $productIds = [];

        // Loop through each item and parse id:quantity
        foreach ($items as $item) {
            list($id, $quantity) = explode(':', $item);

            // Store parsed items as an array of id and quantity
            $parsedItems[] = [
                'id' => (int) $id,
                'quantity' => (int) $quantity
            ];

            // Store product IDs to query database
            $productIds[] = (int) $id;
        }

        // Retrieve all products based on the collected IDs
        $products = Product::whereIn('id', $productIds)->get();

        // Map products with their corresponding quantities
        $productsWithQuantity = $products->map(function ($product) use ($parsedItems) {
            // Find the corresponding quantity for the product's id
            $printquantity = collect($parsedItems)->firstWhere('id', $product->id)['quantity'];

            // Add the quantity to the product data
            return [
                'product' => $product,
                'printquantity' => $printquantity
            ];
        });
        $pdf = Pdf::loadView('admin.report.pdf.pdfproductbarcode', compact('productsWithQuantity'))
            ->setPaper('a4', 'potrait');
        return $pdf->stream('product_barcode.pdf');
    }
    public function delete_product($id)
    {
        $category = Product::find($id);
        $category->delete();
        return redirect('admin/product');
    }
}
