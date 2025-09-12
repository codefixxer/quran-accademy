@extends('teacher.layouts.app')

@section('title', 'TeachersList')

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

        <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


    <!-- App CSS -->
    <link href="{{ asset('assetss/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style">

    <!-- Icons -->
    <link href="{{ asset('assetss/css/icons.min.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')
    <div class="content-page">
        <div class="content">




            <!-- Datatables  -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">

                        <div class="card-header">
                            <h5 class="card-title mb-0">Students List</h5>
                        </div><!-- end card header -->







                        

                        <div class="card-body ">
                                
                                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>
                                                    <button class="btn btn-primary action-btn" data-id="{{ $student->id }}" data-toggle="modal" data-target="#actionModal">
                                                        Action
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            
                        </div><!-- end card-body -->

                    </div><!-- end card -->
                </div><!-- end col-12 -->
            </div><!-- end row -->






            

            <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actionModalLabel">Perform Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="meetLinkForm" action="{{ route('meet.link.store') }}" method="POST">
                    @csrf
                    <input type="hidden" id="userIdInput" name="user_id">
                    
                    <label for="linkInput">Enter Link:</label>
                    <input type="text" id="linkInput" name="link" class="form-control" placeholder="Enter link here..." required>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button> <!-- Changed type to submit -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.action-btn').click(function() {
            let userId = $(this).data('id');
            $('#userIdInput').val(userId); // Set user ID in hidden input
            $('#actionModal').modal('show'); // Show modal
        });
    });
</script>




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
