<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>@yield('title', 'Admin Dashboard')</title>

    @yield('links') 
</head>
<body class="d-flex flex-column vh-100">

    <!-- Navbar -->
    @include('admin.layouts.navbar')  

    <div class="d-flex flex-grow-1">
        <!-- Sidebar -->
        @include('admin.layouts.sidebar')

        <!-- Main Content -->
        <main class="container-fluid px-3">
            <!-- Alert Positioned Lower and Slightly Left -->
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-1 offset-md-1" style="margin-top: 5rem; margin-left: 18rem;">
                    @include('admin.layouts.alert')
                </div>
            </div>

            <div class="row g-0"> 
                <div class="col">
                    <div class="container-fluid">
                        @yield('content') 
                    </div>
                </div>
            </div>
        </main>
    </div>

    @yield('scripts') 

</body>
</html>
