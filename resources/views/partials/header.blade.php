<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="https://marketplace.canva.com/EAFYecj_1Sc/1/0/1600w/canva-cream-and-black-simple-elegant-catering-food-logo-2LPev1tJbrg.jpg" alt="img" width="50" height="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                <li><a class="dropdown-item" href="#">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <div class="navbar-text mobile-cart">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user"></i>
                        </a>
                        <a class="nav-link" href="{{ route('cart.show') }}">
                            <i class="fas fa-shopping-basket"></i>
                        </a>
                    </div>
                </div>
                <div class="navbar-text large-cart">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user"></i>
                    </a>
                    <a class="nav-link" href="{{ route('cart.show') }}">
                        <i class="fas fa-shopping-basket"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>