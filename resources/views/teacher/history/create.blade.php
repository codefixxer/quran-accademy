@extends('teacher.layouts.app')

@section('title', 'Add History')

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
        <div class="col-md-6 mt-5">
            <div class="card shadow-sm">
                <div class="card-header text-center text-black">
                    <h5 class="mb-0">{{ isset($course) ? 'Edit History' : 'Add History' }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ isset($history) ? route('teacher.history.update', $history->id) : route('teacher.history.store') }}" 
                        method="POST" enctype="multipart/form-data">
                      @csrf
                      @if(isset($history))
                          @method('PUT')
                      @endif
      
                      <!-- Hidden User ID -->
                      <input type="hidden" name="user_id" value="{{ $id }}">
      
                      <!-- Description -->
                      <div class="mb-3">
                          <label for="description" class="form-label">Description</label>
                          <input type="text" class="form-control" name="description" id="description" 
                                 placeholder="Enter Description" required 
                                 value="{{ old('description', $history->description ?? '') }}">
                      </div>
      
                      <!-- File Upload -->
                      <div class="mb-3">
                          <label for="file" class="form-label">Upload File</label>
                          <input type="file" class="form-control" name="file" id="file">
                          @if(isset($history) && $history->file)
                              <p>Current File: <a href="{{ asset('storage/' . $history->file) }}" target="_blank">View File</a></p>
                          @endif
                      </div>
      
                      <!-- Submit Button -->
                      <button class="btn btn-primary w-100" type="submit">
                          {{ isset($history) ? 'Update History' : 'Submit' }}
                      </button>
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
