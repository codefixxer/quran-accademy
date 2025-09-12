<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Dashboard')</title>

    @yield('links') 
</head>
<body>
    <div id="app-layout">
    @include('student.layouts.navbar')  
    @include('student.layouts.sidebar') 
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
