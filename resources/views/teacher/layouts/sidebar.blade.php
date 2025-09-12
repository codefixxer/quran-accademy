<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assetss/images/logo-sm.png') }}" alt="Logo Small" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assetss/images/logo-light.png') }}" alt="Logo Light" height="24">
                    </span>
                </a>
                
                <a href="" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assetss/images/logo-sm.png') }}" alt="Logo Small" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assetss/images/logo-dark.png') }}" alt="Logo Dark" height="24">
                    </span>
                </a>
            </div>
            

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="#sidebarDashboards" data-bs-toggle="collapse">
                        <i class="fas fa-chalkboard-teacher text-primary"></i> 
                        <span> Students </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('teacher.student.index') }}" class="tp-link">Student List</a>
                            </li>
                        </ul>
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('teacher.zoom.zoomlinks') }}" class="tp-link">Zoom Link</a>
                            </li>
                        </ul>
                    </div>
                </li>
               
               
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
