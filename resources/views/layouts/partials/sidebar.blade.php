<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{ route('index') }}" class="logo">
                    <span>
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                    </span>
            <span>
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
                    </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">Main</li>
            <li>
                <a href="{{ route('index') }}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
            </li>

            <li>
                <a href="javascript: void(0);"> <i data-feather="grid" class="align-self-center menu-icon"></i><span>Products</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}"><i class="ti-control-record"></i>Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('size.index') }}"><i class="ti-control-record"></i>Sizes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('color.index') }}"><i class="ti-control-record"></i>Colors</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('company.index') }}"><i class="ti-control-record"></i>Companies</a></li>
                    <li class="nav-item"><a class="nav-link" href="sales-index.html"><i class="ti-control-record"></i>Product List</a></li>
                    <li class="nav-item"><a class="nav-link" href="sales-index.html"><i class="ti-control-record"></i>Product Gallery</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- end left-sidenav-->
