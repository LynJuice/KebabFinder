<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <a href="{{ route('index') }}" class="logo d-flex align-items-center me-auto me-lg-0">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1>KebabFinder<span>.</span></h1>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="#hero">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#events">Events</a></li>
        <li><a href="#chefs">Chefs</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav><!-- .navbar -->

    @if (Auth::check())
    <p> Sveiki, {{ Auth::user()->name }} </p>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <div class="nav-item">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
          <i class="bx bx-power-off me-2"></i>

          {{ __('Log Out') }}
        </a>
      </div>
    </form>

    @elseif (Auth::guest())
    <a class="btn-book-a-table" href="{{ Route( 'login' )}}">Prisijungti</a>
    @endif
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

  </div>
</header>