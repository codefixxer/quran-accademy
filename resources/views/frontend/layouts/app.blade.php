<!DOCTYPE html>
<html lang="zxx">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Default Title')</title>
        <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">


@yield('links')

</head>
<body>

    <div class="preloader">
        <div class="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
      </div>
      
      @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')
    <div class="search-popup">
        <button class="close-search"><i class="fa-solid fa-xmark"></i></button>
        <form method="post" action="#">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>





</body>
@yield('scripts')

</html>
