@foreach ($categories as $category)
    <p>Category Name : {{ $category->name }}</p>
 <p>Category Name : {{ $category->slug }}</p>
@endforeach
