@extends('admin.layouts.app')

@section('title', 'StudentsList')

@section('links')
   <!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assetss/images/favicon.ico') }}">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- Datatables CSS -->
<link href="{{ asset('assetss/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assetss/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assetss/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assetss/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assetss/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css">

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

            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive w-100">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Assigned Teacher</th>
                            <th>Assigned Course</th>
                            <th>Course Fee</th>
                            <th>Time Range</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->user ? $student->user->name : 'N/A' }}</td>
                            <td>{{ $student->user ? $student->user->email : 'N/A' }}</td>
                            <td>{{ $student->teacher ? $student->teacher->name : 'N/A' }}</td>
                            <td>{{ $student->course ? $student->course->name : 'N/A' }}</td>
                            <td>{{ $student->course ? $student->course->price : 'N/A' }}</td>
                            <td>{{ $student->start_time }} <strong>TO</strong> {{ $student->end_time }}</td>
                            <td>{{ $student->role ? $student->users->role : 'N/A' }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('admin.student.edit', $student->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                        
                                <!-- Delete Button -->
                                <form action="{{ route('student.delete', $student->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- End of card-body -->
            
        </div><!-- end card -->
    </div><!-- end col-12 -->
</div><!-- end row -->

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

 