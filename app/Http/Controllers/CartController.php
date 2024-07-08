<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function increaseQuantity(Request $request)
    {
        $cartItem = Cart::find($request->id);
        dd("hello");
        $cartItem->quantity++;
        $cartItem->save();

        return response()->json(['success' => true, 'quantity' => $cartItem->quantity]);
    }

    public function decreaseQuantity(Request $request)
    {
        $cartItem = Cart::findOrFail($request->id);
        if ($cartItem->quantity > 1) {
            $cartItem->quantity--;
            $cartItem->save();
        }

        return response()->json(['success' => true, 'quantity' => $cartItem->quantity]);
    }
}
