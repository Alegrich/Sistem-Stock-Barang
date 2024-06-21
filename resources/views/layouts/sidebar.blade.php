<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        
        <span class="app-brand-text demo menu-text fw-bold ms-2">Stock Barang</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item">
        <a href="{{ route('admin.dashboard') }}" class="menu-link ">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
      </li>
      <!-- Items -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-package"></i>
          <div data-i18n="Dashboards">Items</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.items.index') }}" class="menu-link">
                <div data-i18n="Basic">Items List</div>
            </a>
        </li>      
          <li class="menu-item">
            <a href="{{route('admin.items.stockIn')}}" class="menu-link" >
              <div data-i18n="Basic">Stock In</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{route('admin.items.stockOut')}}" class="menu-link" >
              <div data-i18n="Basic">Stock Out</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Supplier -->
      <li class="menu-item">
        <a href="{{route('admin.supplier.index')}}" class="menu-link ">
          <i class="menu-icon tf-icons bx bxs-group"></i>
          <div data-i18n="Dashboards">Supplier</div>
        </a>
      </li>
      <!-- Pages -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Authentications">Staff</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('admin.staff.index')}}" class="menu-link">
              <div data-i18n="Basic">Staff List</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Logout -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link ">
          <i class="menu-icon tf-icons bx bx-log-out-circle"></i>
          <div data-i18n="Dashboards">Log Out</div>
        </a>
      </li>
      

    </ul>
  </aside>
  <!-- / Menu -->
