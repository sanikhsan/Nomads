<div class="container" style="margin-bottom: 60px">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white fixed-top" style="margin: 0px 90px 90px 90px;">
      <a class="navbar-brand" href="{{route('landing')}}">
        <img src="{{asset('landing/images/logo.png')}}" alt="" />
      </a>
      <button
        class="navbar-toggler navbar-toggler-right"
        type="button"
        data-toggle="collapse"
        data-target="#navb"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav ml-auto mr-3">
          <li class="nav-item mx-md-2">
            <a class="nav-link active" href="#home">Home</a>
          </li>
          <li class="nav-item mx-md-2">
            <a class="nav-link" href="#paket-travel">Paket Travel</a>
          </li>
          {{-- <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbardrop"
              data-toggle="dropdown"
            >
              Services
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Link 1</a>
              <a class="dropdown-item" href="#">Link 2</a>
              <a class="dropdown-item" href="#">Link 3</a>
            </div>
          </li> --}}
          <li class="nav-item mx-md-2">
            <a class="nav-link" href="#testimonial">Testimonial</a>
          </li>
          @if (Auth::check())
          <li class="nav-item mx-md-2">
            <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
          </li>
          @endif
        </ul>
        @if (Auth::check())
          <!-- Mobile button -->
            <form action="{{route('logout')}}" method="POST" class="form-inline d-sm-block d-md-none">
              @csrf
              <button class="btn btn-login my-2 my-sm-0">
                Keluar
              </button>
            </form>
          <!-- Desktop Button -->
            <form action="{{route('logout')}}" method="POST" class="form-inline my-2 my-lg-0 d-none d-md-block">
              @csrf
              <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                Keluar
              </button>
            </form>
        @else
          <!-- Mobile button -->
            <form action="{{route('login')}}" class="form-inline d-sm-block d-md-none">
              <button class="btn btn-login my-2 my-sm-0">
                Masuk
              </button>
            </form>
          <!-- Desktop Button -->
            <form action="{{route('login')}}" class="form-inline my-2 my-lg-0 d-none d-md-block">
              <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                Masuk
              </button>
            </form>
        @endif
      </div>
    </nav>
</div>