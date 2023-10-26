<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="text-center">
      <a href="{{ route('admin')}}" class="app-brand-link">
        <img src="{{asset('img/logo.png')}}" alt="Sneat Logo" class="img-fluid" style="width: 75px; height: 50px;">
        <span class="app-brand-text demo menu-text fw-bolder ms-1">KebabFinder</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      @if(Request::is("admin"))
      <li  class="menu-item active">
      @else
      <li  class="menu-item">
      @endif
        <a href="/admin" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Administravimas</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="/dashboard" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user-circle"></i>
          <div data-i18n="Analytics">Dashbord</div>
        </a>
      </li>
      <!-- Database -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Informacija</span></li>
      @if(Request::is("shops/*") || Request::is("shops"))
      <li  class="menu-item active">
      @else
      <li  class="menu-item">
      @endif
        <a href="{{ route('shops.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-crown"></i>
          <div data-i18n="Tables">Kebabinės</div>
        </a>
      </li>
      @if (Auth::user()->hasRole('svetaines administratorius'))
      @if(Request::is("users/*") || Request::is("users"))
      <li  class="menu-item active">
      @else
      <li  class="menu-item">
      @endif
        <a href="/users" class="menu-link">
          <i class="menu-icon tf-icons bx bx-table"></i>
          <div data-i18n="Tables">Vartotojai</div>
        </a>
      </li>
      @endif
      @if(Request::is("products/*") || Request::is("products"))
      <li  class="menu-item active">
      @else
      <li  class="menu-item">
      @endif
      <a href="{{ route('products.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-basket"></i>
          <div data-i18n="Tables">Produktai</div>
        </a>
      </li>
    </ul>
  </aside>
 