<link rel="stylesheet" href="boxicons.min.css">
<script src="https://unpkg.com/boxicons@2.1.3/dist/boxicons.js"></script>
<div class="page-content">
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            Navigation
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <div class="sidebar-content">
            <div class="card card-body">
                <img src="{{ asset('image/carfiq.svg') }}" alt="" width="100px">
            </div>
            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">manejement</div> <i class="icon-menu"></i>
                    </li>
                    <li class="nav-item "><a href="{{ route('user.index') }}" class="nav-link "> <i class="fa fa-user" aria-hidden="true"></i>User</a></li>
                    <li class="nav-item"><a href="{{ route('user.create') }}" class="nav-link   "><i class="fas fa-user-plus" aria-hidden="true"></i>add user</a></li>

                    {{-- <li class="nav-item"><a href="{{ route('user.profile') }}" class="nav-link">profile</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
