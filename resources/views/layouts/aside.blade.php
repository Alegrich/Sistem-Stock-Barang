<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="/">Manajemen Stock</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">MS</a>
    </div>
    <ul class="sidebar-menu">
        @if (Auth::check() && Auth::user()->role == 'admin')
            <li class="{{ Str::startsWith(Request::path(), 'admin') ? 'active' : '' }}"><a class="nav-link" href="/admin"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">User Management</li>
            <li class="{{ Request::path() == 'manajemen-staff' ? 'active' : '' }}"><a class="nav-link" href="/manajemen-staff"><i class="fas fa-user"></i> <span>Manajemen Staf</span></a></li>
        @elseif (Auth::check() && Auth::user()->role == 'staf')
        <li class="{{ Request::path() == '/' ? 'active' : '' }}"><a class="nav-link" href="/"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
        <li class="{{ Request::path() == 'tampil_item' ? 'active' : '' }}"><a class="nav-link" href="{{ route('tampil_item') }}"><i class="fas fa-list-alt"></i> <span>Barang</span></a></li>
        @endif
        <li class="nav-item dropdown {{ Str::startsWith(Request::path(), 'stock') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i> <span>Stock</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::path() == 'stockin' ? 'active' : '' }}"><a class="nav-link" href="/stockin">Stock In</a></li>
                <li class="{{ Request::path() == 'stockout' ? 'active' : '' }}"><a class="nav-link" href="/stockout">Stock Out</a></li>
            </ul>
        </li>
    </ul>


</aside>
