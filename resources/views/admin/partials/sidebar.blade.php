<div class="side-nav">
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <img src="{{ asset('image/favicon.png') }}" alt="" style="width: 50px">
           <span class="nav-item">Ecommarce</span>
    </a>
    <nav>
        <ul>
            <li class="@yield('dashboard_select')">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin/order') }}">
                    <i class="fas fa-users"></i>
                    <span class="nav-item">Customer</span>
                </a>
            </li>
            <li class="sidebar-item @yield('category_select')">
                <a href="{{ route('admin/category') }}" class="sidebar-link has-dropdown collapsed"
                    data-bs-toggle="collapse" data-bs-target="#category" aria-expanded="false" aria-controls="category">
                    <i class="fas fa-tag"></i>
                    <span class="nav-item">Category</span>
                </a>
                <ul id="category" class="sidebar-dropdown list-unstyled accordion-collapse collapse"
                    data-bs-parent="#sidebar">
                    <li>
                        <a href="{{ route('admin/manage-category') }}">
                            <span class="dropdown-item"> Add category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin/category') }}">
                            <span class="dropdown-item"> Show category</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin/product') }}">
                    <i class="fas fa-tshirt"></i>
                    <span class="nav-item">Product</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin/order') }}">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span class="nav-item">Order</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin/order') }}">
                    <i class="fas fa-cash-register"></i>
                    <span class="nav-item">Payment</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin/order') }}">
                    <i class="fas fa-file"></i>
                    <span class="nav-item">Report</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.logout') }}" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
