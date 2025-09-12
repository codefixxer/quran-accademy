@extends('admin.layouts.app')

@section('title', 'Addbook')

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
                    <h5 class="mb-0">{{ isset($book) ? 'Edit book' : 'Add book' }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ isset($book) ? route('admin.books.update', $book->book_id) : route('admin.books.store') }}" 
                        method="POST" 
                        enctype="multipart/form-data"
                        class="row g-3 needs-validation" 
                        novalidate>
                      
                      @csrf
                      @if(isset($book))
                          @method('PUT')
                      @endif
                  
                      <!-- Select Course (Dropdown) -->
                      <div class="col-md-6">
                          <label for="courseSelect" class="form-label">Select Course</label>
                          <select class="form-select" id="courseSelect" name="course_id" required>
                              <option selected disabled value="">Choose a Course...</option>
                              @foreach ($courses as $course)
                                  <option value="{{ $course->id }}" 
                                      {{ (isset($book) && $book->course_id == $course->id) || old('course_id') == $course->id ? 'selected' : '' }}>
                                      {{ $course->name }}
                                  </option>
                              @endforeach
                          </select>
                          <div class="invalid-feedback">Please select a course.</div>
                      </div>
                  
                      <!-- Book Title -->
                      <div class="col-md-6">
                          <label for="bookTitle" class="form-label">Book Title</label>
                          <input type="text" class="form-control" id="bookTitle" name="title"
                              value="{{ isset($book) ? $book->title : old('title') }}"
                              placeholder="Enter Book Title" required>
                          <div class="invalid-feedback">Please enter a book title.</div>
                      </div>
                  
                      <!-- Upload Book File -->
                      <div class="col-md-6">
                          <label for="bookFile" class="form-label">Upload Book File</label>
                          <input type="file" class="form-control" id="bookFile" name="file"
                          {{ isset($book) ? '' : 'required' }}>
                          <div class="invalid-feedback">Please upload a valid book file.</div>
                          @if(isset($book) && $book->file)
                              <p class="mt-2">Current file: <a href="{{ asset('uploads/books/' . $book->file) }}" target="_blank">View File</a></p>
                          @endif
                      </div>
                  
                      <!-- Submit Button -->
                      <div class="col-12 text-center mt-4">
                          <button class="btn btn-success w-100" type="submit">
                              {{ isset($book) ? 'Update Book' : 'Add Book' }}
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
