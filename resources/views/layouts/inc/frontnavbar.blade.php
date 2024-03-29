<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-white">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('favicon.ico') }}" alt="" width="35" height="35"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit">Search</button>
      </form>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url ('category') }}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url ('cart') }}">Cart
            <span class="badge badge-pill bg-dark cart-count">0</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url ('wishlist') }}">Wishlist
          <span class="badge badge-pill bg-dark wishlist-count">0</span>
          </a>
        </li>
        <!--aqui puse esto uwu monse-->
        @guest
          @if(Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login')}}">Login</a>
            </li>
          @endif

          @if(Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{route('register')}}">Register</a>
            </li>
          @endif
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
            {{ Auth::user()->name}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item" href="{{ url('my-orders')}}">
                  My Orders
                </a>
              </li>
            
            <li>
              <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout')}}
            </a>
            <form id="logout-form" action="{{ route('logout')}}" method="POST" class="d-none">
              @csrf
            </form>
            </li>

          </ul>
        </li>
        @endguest
      </ul>
      
    </div>
  </div>
</nav>