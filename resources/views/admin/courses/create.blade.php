@extends('admin.layouts.app')

@section('title', 'Add_Course')

@section('links')
    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{ asset('assetss/images/favicon.ico') }}">

    <!-- App CSS -->
    <link href="{{ asset('assetss/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('assetss/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')





    <!-- Form Validation -->
    <div class="row justify-content-center ms-5">
        <div class="col-md-8 ms-5 mt-4"> <!-- Makes the form well-balanced in width -->
            <div class="card shadow-sm">
                <div class="card-header text-center  text-black">
                    <h5 class="mb-0">{{ isset($course) ? 'Edit course' : 'Add course' }}</h5>
                </div>

                <div class="card-body">
                    <form class="row g-3 needs-validation" novalidate 
                    action="{{ isset($course) ? route('course.update', $course->id) : route('course.store') }}"
                    method="POST" enctype="multipart/form-data">
              
                  @csrf
                  @if(isset($course))
                      @method('PUT')
                  @endif
              
                  <!-- Course Name -->
                  <div class="col-md-6">
                      <label for="courseName" class="form-label">Course Name</label>
                      <input type="text" class="form-control" name="name" id="courseName"
                             placeholder="Enter Course Name" value="{{ old('name', $course->name ?? '') }}" required>
                      <div class="invalid-feedback">Please enter a course name.</div>
                  </div>
              
                  <!-- Course Price -->
                  <div class="col-md-6">
                      <label for="coursePrice" class="form-label">Course Price</label>
                      <input type="number" class="form-control" name="price" id="coursePrice"
                             placeholder="Enter Course Price" value="{{ old('price', $course->price ?? '') }}" required>
                      <div class="invalid-feedback">Please enter a valid price.</div>
                  </div>
              
                  <!-- Classes per Week -->
                  <div class="col-md-6">
                      <label for="classesPerWeek" class="form-label">Classes per Week</label>
                      <select class="form-select" name="schedule" id="classesPerWeek" required>
                          <option selected disabled value="">Choose...</option>
                          @for ($i = 1; $i <= 7; $i++)
                              <option value="{{ $i }}" {{ old('schedule', $course->schedule ?? '') == $i ? 'selected' : '' }}>
                                  {{ $i }} time{{ $i > 1 ? 's' : '' }} a week
                              </option>
                          @endfor
                      </select>
                      <div class="invalid-feedback">Please select the number of classes.</div>
                  </div>
              
                  <!-- Course Image Upload -->
                  <div class="col-md-6">
                      <label for="courseImage" class="form-label">Upload Course Image</label>
                      <input type="file" class="form-control" id="courseImage" name="image" accept="image/*">
                      @if(isset($course) && $course->image)
                          <div class="mt-2">
                              <label>Current Image:</label>
                              <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" width="100" class="img-thumbnail">
                          </div>
                      @endif
                      <div class="invalid-feedback">Please upload a valid course image.</div>
                  </div>
              
                  <!-- Terms and Conditions -->
                  <div class="col-12">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                          <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                  </div>
              
                  <!-- Submit Button -->
                  <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">
                          {{ isset($course) ? 'Update Course' : 'Create Course' }}
                      </button>
                  </div>
              
              </form>
              
                </div>
                <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
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
