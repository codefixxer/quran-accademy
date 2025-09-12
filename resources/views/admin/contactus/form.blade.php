@extends('admin.layouts.app')

@section('title', 'Contact Us')

@section('links')
    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{ asset('assetss/images/favicon.ico') }}">
    <!-- App CSS -->
    <link href="{{ asset('assetss/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons -->
    <link href="{{ asset('assetss/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="row justify-content-center ms-5">
        <div class="col-md-8 ms-5 mt-4">
            <div class="card shadow-sm">

                <div class="card-header text-center text-black">
                    <h5 class="mb-0">Contact Us Form</h5>
                </div>

                <div class="card-body">

                    {{-- success flash --}}
                    @if(session('success'))
                        <div class="alert alert-success mb-3">{{ session('success') }}</div>
                    @endif

                    {{-- validation errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" novalidate
                          action="{{ route('admin.contactus.store') }}"
                          method="POST">
                        @csrf

                        {{-- Email --}}
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email"
                                   placeholder="Enter your email address"
                                   value="{{ old('email') }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @else
                            <div class="invalid-feedback">Please enter a valid email.</div> @enderror
                        </div>

                        {{-- Message --}}
                        <div class="col-md-12">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror"
                                      id="message" name="message"
                                      placeholder="Write your message here..." rows="5"
                                      required>{{ old('message') }}</textarea>
                            @error('message') <div class="invalid-feedback">{{ $message }}</div> @else
                            <div class="invalid-feedback">Please enter your message.</div> @enderror
                        </div>

                        {{-- Terms --}}
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">You must agree before submitting.</div>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="col-12 d-flex gap-2">
                            <button class="btn btn-primary w-100" type="submit">Send Message</button>
                        </div>

                    </form>
                </div><!-- end card-body -->

            </div><!-- end card -->
        </div><!-- end col -->
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
    <script src="{{ asset('assetss/js/app.js') }}"></script>

    {{-- Bootstrap validation --}}
    <script>
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
@endsection
