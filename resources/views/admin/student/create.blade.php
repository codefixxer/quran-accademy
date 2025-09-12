@extends('admin.layouts.app')

@section('title', 'Add User')

@section('links')
    <link rel="shortcut icon" href="{{ asset('assetss/images/favicon.ico') }}">
    <link href="{{ asset('assetss/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('assetss/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

            <div class="container-fluid ms-5">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Admin Dashboard</h4>
                    </div>
                </div>

                <!-- Add User Form -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-header text-center text-black">
                                <h5 class="mb-0">{{ isset($student) ? 'Edit student' : 'Add student' }}</h5>
                            </div>

                            <div class="card-body">
                                <form class="row g-3 needs-validation" novalidate
                                action="{{ isset($student->id) ? route('admin.student.update', $student->id) : route('admin.student.store') }}"
                                method="POST" enctype="multipart/form-data">
                            
                                @csrf
                                @if(isset($student))
                                    @method('PUT')
                                @endif
                            
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Name" value="{{ old('name', $student->user->name ?? '') }}" required>
                                    <div class="invalid-feedback">Please enter a name.</div>
                                </div>
                            
                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Email" value="{{ old('email', $student->user->email ?? '') }}" required>
                                    <div class="invalid-feedback">Please enter a valid email.</div>
                                </div>
                            
  
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Enter Password" required>
                                        <div class="invalid-feedback">Please enter a password.</div>
                                    </div>
                            
                                <!-- Select Teacher -->
                                <div class="col-md-6">
                                    <label for="teacher" class="form-label">Select Teacher</label>
                                    <select class="form-select" name="teacher_id" id="teacher" required>
                                        <option value="">-- Select Teacher --</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ isset($student) && $student->teacher_id == $teacher->id ? 'selected' : '' }}>
                                                {{ $teacher->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a teacher.</div>
                                </div>
                            
                                <!-- Select Course -->
                                <div class="col-md-6">
                                    <label for="course" class="form-label">Select Course</label>
                                    <select class="form-select" name="course_id" id="course" required>
                                        <option value="">-- Select Course --</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}" {{ isset($student) && $student->course_id == $course->id ? 'selected' : '' }}>
                                                {{ $course->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a course.</div>
                                </div>


                                <div class="col-md-3">
                                    <label for="time" class="form-label">Start Time</label>
                                    <input type="time" class="form-control" id="start_time" name="start_time"
                                        placeholder="Enter Time " value="{{ old('start_time', $student->start_time ?? '') }}"                                    }}" required>
                                    <div class="invalid-feedback">Please enter a name.</div>
                                </div>


                                <div class="col-md-3">
                                    <label for="time" class="form-label">End Time</label>
                                    <input type="time" class="form-control" id="end_time" name="end_time"
                                        placeholder="Enter Time " value="{{ old('end_time', $student->end_time ?? '') }}"                                    }}" required>
                                    <div class="invalid-feedback">Please enter a name.</div>
                                </div>
                            
                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">
                                        {{ isset($student) ? 'Update' : 'Submit' }}
                                    </button>
                                </div>
                            
                            </form>
                            

                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>

@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const startTimeInput = document.getElementById("start_time");
        const endTimeInput = document.getElementById("end_time");

        function validateTime() {
            const startTime = startTimeInput.value;
            const endTime = endTimeInput.value;

            if (startTime && endTime && startTime >= endTime) {
                alert("❌ Start Time must be less than End Time!");
                endTimeInput.value = ""; // Reset End Time if invalid
            }
        }

        startTimeInput.addEventListener("change", validateTime);
        endTimeInput.addEventListener("change", validateTime);
    });
</script>

    <script src="{{ asset('assetss/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assetss/js/app.js') }}"></script>
@endsection
