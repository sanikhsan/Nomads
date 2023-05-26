<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{route('admin.dashboard')}}"><img src="{{asset('landing/images/logo@2x.png')}}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                
                <li
                    class="sidebar-item {{request()->routeIs('admin.dashboard') ? 'active' : ''}}">
                    <a href="{{route('admin.dashboard')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->routeIs('admin.gallery*') ? 'active' : ''}}">
                    <a href="{{route('admin.gallery.index')}}" class='sidebar-link'>
                        <i class="bi bi-image-fill"></i>
                        <span>Gallery</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->routeIs('admin.transaction*') ? 'active' : ''}}">
                    <a href="{{route('admin.transaction.index')}}" class='sidebar-link'>
                        <i class="bi bi-basket-fill"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                
                <li
                    class="sidebar-item {{request()->routeIs('admin.travels*') ? 'active' : ''}}">
                    <a href="{{route('admin.travels.index')}}" class='sidebar-link'>
                        <i class="bi bi-map-fill"></i>
                        <span>Travel</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->routeIs('admin.rekening*') ? 'active' : ''}}">
                    <a href="{{route('admin.rekening.index')}}" class='sidebar-link'>
                        <i class="bi bi-wallet2"></i>
                        <span>Rekening</span>
                    </a>
                </li>

                <li class="sidebar-title">Akun</li>

                <li
                    class="sidebar-item">
                    <a href="{{route('admin.profile')}}" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Profile</span>
                    </a>
                </li>

                <li
                    class="sidebar-item">
                    <a href="{{route('admin.password')}}" class='sidebar-link'>
                        <i class="bi bi-shield-lock-fill"></i>
                        <span>Password</span>
                    </a>
                </li>
                
                <li
                    class="sidebar-item">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <a href="javascript:;" onclick="parentNode.submit();" class='sidebar-link'>
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Keluar</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>

        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>