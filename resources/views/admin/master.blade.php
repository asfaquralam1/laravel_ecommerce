<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fontawsome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <title>@yield('page_title')</title>
    <link rel="icon" href="{{ asset('image/favicon.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">

</head>

<body>
    <div class="wrapper">
        <div class="row">
            <div class="col-4">
                {{-- <aside id="sidebar">
                    <div class="d-flex">
                        <button id="toggle-btn" type="button"><i class="fas fa-bars"></i></button>
                        <div class="sidebar-logo">
                            <a href="{{ route('admin/dashboard') }}">Ecommarce</a>
                        </div>
                    </div>
                    <ul class="sidebar-nav">
                        <li class="sidebar-item @yield('dashboard_select')">
                            <a href="#" class="sidebar-link">
                                <i class="far fa-user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin/category') }}" class="sidebar-link">
                                <i class="far fa-user"></i>
                                <span>Category</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('category_select')">
                            <a href="{{ route('admin/category') }}" class="sidebar-link has-dropdown collapsed"
                                data-bs-toggle="collapse" data-bs-target="#category" aria-expanded="false"
                                aria-controls="category">
                                <i class="far fa-user"></i>
                                <span>Category</span>
                            </a>
                            <ul id="category" class="sidebar-dropdown list-unstyled accordion-collapse collapse"
                                data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        Add category
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        Edit category
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin/product') }}" class="sidebar-link">
                                <i class="far fa-user"></i>
                                <span>Product</span>
                            </a>
                        </li>
                    </ul>
                    <div class="sidebar-footer">
                        <a href="#" class="sidebar-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </aside> --}}
                <nav>
                    <ul>
                        <li>
                            <a href="{{ route('admin/dashboard') }}" class="logo"><img
                                    src="{{ asset('image/favicon.png') }}" alt="" style="width: 50px">
                                <span class="nav-item">Ecommarce</span>
                            </a>
                        </li>
                        <li class="@yield('dashboard_select')">
                            <a href="{{ route('admin/dashboard') }}">
                                <i class="fas fa-home"></i>
                                <span class="nav-item">Dashboard</span>
                            </a>
                        </li>
                        <!-- <li class="sidebar-item @yield('category_select')">
                            <a href="{{ route('admin/category') }}" class="sidebar-link has-dropdown collapsed"
                                data-bs-toggle="collapse" data-bs-target="#category" aria-expanded="false"
                                aria-controls="category">
                                <i class="far fa-user"></i>
                                <span>Category</span>
                            </a>
                            <ul id="category" class="sidebar-dropdown list-unstyled accordion-collapse collapse"
                                data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        Add category
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        Edit category
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="{{ route('admin/category') }}">
                                <i class="fas fa-list"></i>
                                <span class="nav-item">Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin/product') }}">
                                <i class="fas fa-list"></i>
                                <span class="nav-item">Product</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="logout">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="nav-item">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-8">
                @section('container')
                @show
            </div>
        </div>
    </div>
    {{-- <nav>
        <ul>
            <li>
                <a href=""><img src="{{ asset('image/favicon.png') }}" alt="" style="width: 50px">
                    <span class="nav-item">Ecommarce</span>
                </a>
            </li>
            <li class="sidebar-item @yield('dashboard_select')">
                <a href="{{ route('admin/dashboard') }}" class="sidebar-link">
                    <i class="far fa-user"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin/category') }}" class="sidebar-link">
                    <i class="far fa-user"></i>
                    <span>Category</span>
                </a>
            </li>
        </ul>
    </nav> --}}

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
