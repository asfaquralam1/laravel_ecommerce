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
                    
                    <div class="navbar-cart mobile-cart">

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

                <div class="search-area">
                    <input type="text" name="search" placeholder="Search..." value="{{ request('q') }}"
                        class="form-control search-input">
                    <i class="fas fa-search search-icon"></i>
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
                <a aria-current="page" href="{{ route('home') }}">Home</a>
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
