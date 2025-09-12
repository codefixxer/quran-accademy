@extends('teacher.layouts.app')

@section('title', 'Teacher Dashboard')

@section('links')
    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{ asset('assetss/images/favicon.ico') }}">

    <!-- App CSS -->
    <link href="{{ asset('assetss/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('assetss/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Teacher Dashboard</h4>
                </div>
            </div>
</div>
@endsection

@section('scripts')
    <!-- Vendor Scripts -->
    <script src="{{ asset('assetss/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/feather-icons/feather.min.js') }}"></script>

    <!-- ApexCharts JS -->
    <script src="{{ asset('assetss/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- External Script (Unchanged) -->
    <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

    <!-- Widgets Init JS -->
    <script src="{{ asset('assetss/js/pages/crm-dashboard.init.js') }}"></script>

    <!-- App JS -->
    <script src="{{ asset('assetss/js/app.js') }}"></script>
@endsection
