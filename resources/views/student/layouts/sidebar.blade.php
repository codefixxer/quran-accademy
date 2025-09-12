<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assetss/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assetss/images/logo-light.png') }}" alt="logo" height="24">
                    </span>
                </a>
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assetss/images/logo-sm.png') }}" alt="logo" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assetss/images/logo-dark.png') }}" alt="logo" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Student Dashboard</li>
                <li>
                    <a href="#sidebarDashboards" data-bs-toggle="collapse">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('student.books.index') }}" class="tp-link">Book</a>
                            </li>
                            <li>
                                <a href="{{ route('student.history.index') }}" class="tp-link">History</a>
                            </li>
                            <li>
                                <a href="ecommerce.html" class="tp-link">Class</a>
                            </li>
                        </ul>
                    </div>
                </li>

                



                
                <li>
                    <a href="#" class="tp-link">
                        <i data-feather="columns"></i>
                        <span> todo </span>
                    </a>
                </li>
               
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
