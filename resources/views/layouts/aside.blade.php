<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="/">Manajemen Stock</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">MS</a>
    </div>
    <ul class="sidebar-menu">
        @if (Auth::check() && Auth::user()->role == 'admin')
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->routeIs('admin.*') ? 'active' : '' }}"><a class="nav-link"
                href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i>
                <span>Dashboard Admin</span></a></li>


            <li class="menu-header">Starter</li>

            <li class="{{ request()->routeIs('items.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('items.index') }}">
                    <i class="fas fa-box"></i>
                    <span>Items</span>
                </a>
            </li>            
            <li class="{{ request()->routeIs('category.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('category.index') }}">
                    <i class="fa-solid fa-list"></i>
                    <span>Category</span>
                </a>
            </li>            
            <li class="{{ request()->routeIs('supplier.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('supplier.index') }}">
                    <i class="fas fa-truck"></i>
                    <span>Supplier</span>
                </a>
            </li>            


            <li class="nav-item dropdown {{ Str::startsWith(Request::path(), 'admin/stock') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i>
                    <span>Stock</span></a>       
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('stockin.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.stockin.index') }}">Stock In</a></li>
                    <li class="{{ request()->routeIs('stockout.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.stockout.index') }}">Stock Out</a></li>
                </ul>
            </li>
        @else
        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->routeIs('staff.*') ? 'active' : '' }}"><a class="nav-link"
            href="{{route('staff.dashboard')}}"><i class="fas fa-home"></i>
            <span>Dashboard Staff</span></a></li>


        <li class="menu-header">Starter</li>

        <li class="{{ request()->routeIs('#') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('items.index') }}">
                <i class="fas fa-box"></i>
                <span>Items</span>
            </a>
        </li>
        <li class="nav-item dropdown {{ Str::startsWith(Request::path(), 'staff/stock') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i>
                <span>Stock</span></a>       
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('staff.stockin.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('staff.stockin.index') }}">Stock In</a></li>
                <li class="{{ request()->routeIs('staff.stockout.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('staff.stockout.index') }}">Stock Out</a></li>
            </ul>
        </li>
        @endif

    </ul>

</aside>
