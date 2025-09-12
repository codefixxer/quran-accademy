<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>@yield('title', 'Admin Dashboard')</title>

    

    @yield('links') 
</head>
<body>
    <div id="app-layout">
        @include('teacher.layouts.navbar')  
        @include('teacher.layouts.sidebar') 
    </div>
    
    <main  class="container-fluid px-3>


        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-1 offset-md-1" style="margin-top: 5rem; margin-left: 18rem;">
                @include('admin.layouts.alert')
            </div>
        </div>
        @yield('content') 
    </main>
   

    @yield('scripts') 

</body>
</html>
