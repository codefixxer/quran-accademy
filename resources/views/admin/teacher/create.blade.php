@extends('admin.layouts.app')

@section('title', 'Add Teacher')

@section('links')
    <link rel="shortcut icon" href="{{ asset('assetss/images/favicon.ico') }}">
    <link href="{{ asset('assetss/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('assetss/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')


    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Admin Dashboard</h4>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center text-black">
                    <h5 class="mb-0">Add Teacher</h5>
                </div>

                <div class="card-body">
                    <form class="row g-3 needs-validation" novalidate
                        action="{{ isset($teacher->id) ? route('admin.teacher.update', $teacher->id) : route('admin.teacher.store') }}"
                        method="POST">

                        @csrf
                        @if (isset($teacher->id))
                            @method('PUT')
                        @endif

                        <!-- Name -->
                        <div class="col-md-12">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter Full Name" value="{{ old('name', $teacher->name ?? '') }}" required>
                            <div class="invalid-feedback">Please enter your full name.</div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter Email" value="{{ old('email', $teacher->email ?? '') }}" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>

                        <!-- Password (Only show in Create mode) -->
                        <div class="col-md-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Enter Password" required>
                            <div class="invalid-feedback">Please enter a password.</div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">
                                {{ isset($teacher->id) ? 'Update' : 'Create' }}
                            </button>
                        </div>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

@section('scripts')
    <script src="{{ asset('assetss/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assetss/js/app.js') }}"></script>
@endsection
