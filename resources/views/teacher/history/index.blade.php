@extends('teacher.layouts.app')

@section('title', 'History List')

@section('links')
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assetss/images/favicon.ico') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Datatables CSS -->
    <link href="{{ asset('assetss/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assetss/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assetss/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assetss/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('assetss/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css">

    <!-- App CSS -->
    <link href="{{ asset('assetss/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style">

    <!-- Icons -->
    <link href="{{ asset('assetss/css/icons.min.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Datatables -->
        <div class="row">  
            <div class="col-12">
                <div class="card shadow-sm">

                    <div class="card-header">
                        <h5 class="card-title mb-0">History List</h5>
                    </div><!-- end card-header -->

                    <div class="card-body">
                        <!-- Add or Edit History Button -->
                        @if ($todayHistory)
                            <a href="{{ route('teacher.history.edit', $todayHistory->id) }}" class="btn btn-sm btn-warning mb-3">
                                Edit History
                            </a>
                        @else
                            <a href="{{ route('teacher.history.create', ['id' => $id]) }}" class="btn btn-sm btn-primary mb-3">
                                Add History
                            </a>
                        @endif

                        <!-- History Table -->
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>File</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $history)
                                    <tr>
                                        <td>{{ $history->id }}</td>
                                        <td>{{ $history->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $history->description }}</td>
                                        <td>
                                            @if ($history->file)
                                                <a href="{{ asset('storage/' . $history->file) }}" target="_blank">View File</a>
                                            @else
                                                No File
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('teacher.history.edit', $history->id) }}" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                            <form action="{{ route('teacher.history.destroy', $history->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-12 -->
        </div><!-- end row -->

    </div><!-- end content -->
</div><!-- end content-page -->
@endsection





















                @section('scripts')
                    <!-- Vendor -->
                    <script src="{{ asset('assetss/libs/jquery/jquery.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/simplebar/simplebar.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/node-waves/waves.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/feather-icons/feather.min.js') }}"></script>

                    <!-- Datatables js -->
                    <script src="{{ asset('assetss/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>

                    <!-- dataTables.bootstrap5 -->
                    <script src="{{ asset('assetss/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>

                    <!-- buttons.colVis -->
                    <script src="{{ asset('assetss/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>

                    <!-- buttons.bootstrap5 -->
                    <script src="{{ asset('assetss/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>

                    <!-- dataTables.keyTable -->
                    <script src="{{ asset('assetss/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js') }}"></script>

                    <!-- dataTable.responsive -->
                    <script src="{{ asset('assetss/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

                    <!-- dataTables.select -->
                    <script src="{{ asset('assetss/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
                    <script src="{{ asset('assetss/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js') }}"></script>

                    <!-- Datatable Demo App Js -->
                    <script src="{{ asset('assetss/js/pages/datatable.init.js') }}"></script>

                    <!-- App js-->
                    <script src="{{ asset('assetss/js/app.js') }}"></script>

                @endsection
