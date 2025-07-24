<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}"><img
                        src="https://marketplace.canva.com/EAFYecj_1Sc/1/0/1600w/canva-cream-and-black-simple-elegant-catering-food-logo-2LPev1tJbrg.jpg"
                        alt="img" width="50" height="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item"
                                            href="{{ route('category.product', $category->id) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                    <div class="navbar-cart mobile-cart">

                        {{-- <form class="d-flex me-3" action="{{ route('search') }}" method="GET">
                            <input class="form-control me-2" type="search" name="query"
                                placeholder="Search products..." aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> --}}
                        <input type="text" id="search" placeholder="Search products...">
                        <select id="category">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <div id="product-list">
                            @include('site.partials.product-list', ['products' => $products])
                        </div>

                        @if (Auth::user())
                            <a class="nav-link" href="{{ route('profile') }}">
                                <i class="fas fa-user"></i>
                            </a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-user"></i>
                            </a>
                        @endif
                        <a class="nav-link" href="{{ route('cart') }}">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="text-danger">{{ count((array) session('cart')) }}</span>
                        </a>
                    </div>
                </div>
                <div class="navbar-cart large-cart">

                    {{-- <form class="d-flex me-3" action="{{ route('search') }}" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="Search products..."
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> --}}
                    <input type="text" id="search" placeholder="Search products...">
                    <select id="category">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <div id="product-list">
                        @include('site.partials.product-list', ['products' => $products])
                    </div>

                    @if (Auth::user())
                        <a class="nav-link" href="{{ route('profile') }}">
                            <i class="fas fa-user"></i>
                        </a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-user"></i>
                        </a>
                    @endif
                    <a class="nav-link" href="{{ route('cart') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="text-danger">{{ count((array) session('cart')) }}</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>

@push('scripts')
    <script>
        $(document).ready(function() {
            // function fetchProducts() {
                let search = $('#search').val();
                let category = $('#category').val();
                console.log('hello', search);

                $.ajax({
                    url: "{{ route('products.filter') }}",
                    type: 'GET',
                    data: {
                        search: search,
                        category: category,
                    },
                    success: function(data) {
                        $('#product-list').html(data);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            // }

            $('#search, #category').on('input change', fetchProducts);
        });
    </script>
@endpush
