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


                <li class="menu-title">Admin Dashboard</li>

                <li>
                    <a href="#sidebarCourses" data-bs-toggle="collapse">
                        <i class="fas fa-book-open text-info"></i>
                        <span> Courses </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCourses">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.courses.create') }}" 
                                   class="tp-link">
                                    Add Course
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.courses.index') }}" 
                                   class="tp-link">
                                    List Courses
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                </li>
                
                <li>
                    <a href="#sidebarTeachers" data-bs-toggle="collapse">
                        <i class="fas fa-user-graduate text-success"></i>
                        <span> Teachers </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTeachers">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.teacher.create')}}">Add Teacher</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.teacher.index') }}">List Teachers</a>
                            </li>
                        </ul>
                                            
                    </div>
                </li>





                <li>
                    <a href="#sidebarStudents" data-bs-toggle="collapse">
                        <i class="fas fa-chalkboard-teacher text-primary"></i> 
                        <span> Students </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarStudents">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.student.create') }}" >Add Student</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.student.index' )}}" >List Student</a>
                            </li>
                        </ul>
                    </div>
                </li>






                <li>
                    <a href="#sidebarBooks" data-bs-toggle="collapse">
                        <i class="fas fa-journal-whills text-primary"></i>
                        <span> Books </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBooks">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.books.create') }}" >Add New Book</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.books.index') }}" >List All Books</a>
                            </li>
                        </ul>
                    </div>
                </li>
                



                <li>
                    <a href="#sidebarFooter" data-bs-toggle="collapse" data-bs-parent="#sidebarMenu">
                        <i class="fas fa-shoe-prints text-primary"></i> 
                        <span> Footer </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarFooter">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.footer.create') }}">Add New Footer</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.footer.index') }}">List All Footer</a>
                            </li>
                        </ul>
                    </div>
                </li>




                <li>
                    <a href="#sidebarContact" data-bs-toggle="collapse" data-bs-parent="#sidebarMenu">
                        <i class="fas fa-envelope text-success"></i>  
                        <span> Contact Us </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarContact">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.contactus.create') }}">Add New Contact Us</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.contactus.index') }}">List All Contact</a>
                            </li>
                        </ul>
                    </div>
                </li>
                






























































                <li class="menu-title mt-2">Apps</li>
    
                <li>
                    <a href="apps-todolist.html" class="tp-link">
                        <i data-feather="columns"></i>
                        <span> Todo List </span>
                    </a>
                </li>
               
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>