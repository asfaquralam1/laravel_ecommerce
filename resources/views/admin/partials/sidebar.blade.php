<div class="side-nav" id="sidenav">
    <nav>
        <ul>
            <img src="{{ asset('image/site_logo.jpg') }}" class="logo" alt="">
            <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a> -->
            <a href="javascript:void(0)" class="closebtn" id="sidebar-close">×</a>
            <li class="sidebar-item @yield('dashboard_select')">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.order') }}">
                    <i class="fas fa-users"></i>
                    <span class="nav-item">Customer</span>
                </a>
            </li>
            <li class="@yield('category_select') dropdown-item-parent">
                <a href="{{ route('admin.category') }}" class="sidebar-link has-dropdown collapsed"
                    data-bs-toggle="collapse" data-bs-target="#category" aria-expanded="false" aria-controls="category">
                    <i class="fas fa-tag"></i>
                    <span class="nav-item">Category</span>
                </a>
                <ul id="category" class="sidebar-dropdown list-unstyled accordion-collapse collapse"
                    data-bs-parent="#sidebar">
                    <li>
                        <a href="{{ route('admin.manage.category') }}">
                            <span class="dropdown-item"> Add category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.category') }}">
                            <span class="dropdown-item"> Show category</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.product') }}">
                    <i class="fas fa-tshirt"></i>
                    <span class="nav-item">Product</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.order') }}">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span class="nav-item">Order</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.order') }}">
                    <i class="fas fa-cash-register"></i>
                    <span class="nav-item">Payment</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.order') }}">
                    <i class="fas fa-file"></i>
                    <span class="nav-item">Report</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.logout') }}" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<script>
    // function openNav() {
    //     document.getElementById("sidenav").style.width = "250px";
    // }

    function closeNav() {
        document.getElementById("sidenav").style.width = "0";
    }
</script>