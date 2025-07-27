<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="https://marketplace.canva.com/EAFYecj_1Sc/1/0/1600w/canva-cream-and-black-simple-elegant-catering-food-logo-2LPev1tJbrg.jpg"
                        alt="img" width="50" height="50">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- <ul class="navbar-nav  mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
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
                    </ul> --}}
                    <div class="navbar-cart mobile-cart">

                        <div class="input-group">
                            <input type="text" name="search" class="form-control search-input"
                                placeholder="Search products..." value="{{ request('q') }}">
                            <span class="input-group-text" id="search-icon">
                                <i class="fas fa-search"></i>
                            </span>
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

                <div class="input-group">
                    <input type="text" name="search" class="form-control search-input"
                        placeholder="Search products..." value="{{ request('q') }}">
                    <span class="input-group-text" id="search-icon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>

                <div class="navbar-cart large-cart">

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

        <ul id="menu">
            <li class="nav-item">
                <a  aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            @foreach ($categories as $category)
                <li class="nav-item">
                    <a href="{{ route('category.product', $category->name) }}">{{ ucfirst($category->name) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</header>

@push('scripts')
    <script>
        $(function() {
            let minPrice = {{ request('min_price', 0) }};
            let maxPrice = {{ request('max_price', 10000) }};

            $("#price-range").slider({
                range: true,
                min: 0,
                max: 10000,
                values: [minPrice, maxPrice],
                slide: function(event, ui) {
                    $("#min-price-show").text(ui.values[0]);
                    $("#max-price-show").text(ui.values[1]);
                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);
                }
            });

            $("#min-price-show").text(minPrice);
            $("#max-price-show").text(maxPrice);
        });

        let timer;
        $(document).ready(function() {
            $('.search-input').on('input', function() {
                clearTimeout(timer);
                const query = $(this).val();

                if (query.length > 2) {
                    timer = setTimeout(function() {
                        window.location.href = `/search?q=${encodeURIComponent(query)}`;
                    }, 1000);
                }
            });
        });
    </script>
@endpush
