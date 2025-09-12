@extends('student.layouts.app')

@section('title', 'ListBooks')

@section('links')
    <link rel="shortcut icon" href="{{ asset('assetss/images/favicon.ico') }}">
    <link href="{{ asset('assetss/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('assetss/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="container-fluid">
    <!-- Breadcrumb -->
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Teacher Dashboard</h4>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row justify-content-center ms-5">
        <div class="col-12 col-xl-8 ms-5"> <!-- Added max-width container -->
            <div class="card shadow">
                <div class="card-header bg-light py-3">
                    <h3 class="card-title text-center mb-0">
                        <i class="fas fa-book-open me-2 text-primary"></i>Course Materials
                    </h3>
                </div>

                <div class="card-body p-0">
                    <div class="container-fluid px-4 py-3"> 
                        <!-- Book List -->
                        <div class="row g-3">
                            @foreach ($books as $book)
                                <div class="col-12">
                                    <div class="card shadow-sm">
                                        <div class="card-body py-3">
                                            <div class="row align-items-center">
                                                <div class="col-1 text-center d-none d-md-block">
                                                    <i class="fas fa-book fa-lg text-primary"></i>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <h5 class="fw-bold mb-1">{{ $book->title }}</h5>
                                                    <p class="text-muted mb-0">Author: {{ $book->author }}</p>
                                                </div>
                                                <div class="col-md-3 col-6 mt-2 mt-md-0">
                                                    <span class="badge bg-primary me-2">Course:</span>
                                                    <span>{{ $book->course->name }}</span> 
                                                </div>
                                                <div class="col-md-3 col-6 text-end">
                                                    <div class="d-flex align-items-center justify-content-end gap-2">
                                                        <span class="text-muted small d-none d-sm-inline">PDF, {{ $book->size }}</span>
                                                        <a href="{{ asset('storage/' . $book->file) }}" class="btn btn-primary btn-sm" target="_blank">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    
                        
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('assetss/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assetss/js/app.js') }}"></script>
@endsection