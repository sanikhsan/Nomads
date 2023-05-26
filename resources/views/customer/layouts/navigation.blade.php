<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="{{url('/')}}"><img src="{{asset('landing/images/logo.png')}}" alt="Logo" srcset=""></a>
            </div>
            <div class="header-top-right">

                <div class="dropdown">
                    <a href="#" class="user-dropdown d-flex dropend" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2" >
                            <img src="https://ui-avatars.com/api/?name={{Auth::user()->username}}" alt="Avatar">
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name">{{Auth::user()->name}}</h6>
                            <p class="user-dropdown-status text-sm text-muted">&commat;{{Auth::user()->username}}</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="{{route('customer.profile')}}">Profile</a></li>
                      <li><a class="dropdown-item" href="{{route('customer.password')}}">Password</a></li>
                      <li><hr class="dropdown-divider"></li>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <li>
                                <button type="submit" class="dropdown-item">Logout</button>
                            </li>
                        </form>
                    </ul>
                </div>

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <li
                    class="menu-item">
                    <a href="{{route('customer.dashboard')}}" class='menu-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li
                    class="menu-item">
                    <a href="{{route('customer.profile')}}" class='menu-link'>
                        <i class="bi bi-person-circle"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li
                    class="menu-item">
                    <a href="{{route('customer.password')}}" class='menu-link'>
                        <i class="bi bi-shield-lock"></i>
                        <span>Password</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>