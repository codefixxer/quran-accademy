@extends('admin.layouts.app')

@section('title', isset($footer) ? 'Edit Footer' : 'Add Footer')

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
                    <h5 class="mb-0">{{ isset($footer) ? 'Update Footer Data' : 'Insert Footer Data' }}</h5>
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
                          action="{{ isset($footer) ? route('admin.footer.update', $footer->id) : route('admin.footer.store') }}"
                          method="POST">

                        @csrf
                        @if(isset($footer))
                            @method('PUT')
                        @endif

                        {{-- WhatsApp (URL - optional) --}}
                        <div class="col-md-6">
                            <label for="whatsapp" class="form-label">WhatsApp (URL)</label>
                            <input type="text"
                                   class="form-control @error('whatsapp') is-invalid @enderror"
                                   id="whatsapp" name="whatsapp"
                                   placeholder="https://wa.me/923001234567 or https://api.whatsapp.com/send?phone=..."
                                   value="{{ old('whatsapp', $footer->whatsapp ?? '') }}">
                            @error('whatsapp') <div class="invalid-feedback">{{ $message }}</div> @else
                            <div class="invalid-feedback">Please provide a valid value.</div> @enderror
                        </div>

                        {{-- Facebook --}}
                        <div class="col-md-6">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="text"
                                   class="form-control @error('facebook') is-invalid @enderror"
                                   id="facebook" name="facebook" placeholder="https://facebook.com/yourpage"
                                   value="{{ old('facebook', $footer->facebook ?? '') }}">
                            @error('facebook') <div class="invalid-feedback">{{ $message }}</div> @else
                            <div class="invalid-feedback">Please provide a valid value.</div> @enderror
                        </div>

                        {{-- Instagram --}}
                        <div class="col-md-6">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text"
                                   class="form-control @error('instagram') is-invalid @enderror"
                                   id="instagram" name="instagram" placeholder="https://instagram.com/yourhandle"
                                   value="{{ old('instagram', $footer->instagram ?? '') }}">
                            @error('instagram') <div class="invalid-feedback">{{ $message }}</div> @else
                            <div class="invalid-feedback">Please provide a valid value.</div> @enderror
                        </div>

                        {{-- TikTok --}}
                        <div class="col-md-6">
                            <label for="tiktok" class="form-label">TikTok</label>
                            <input type="text"
                                   class="form-control @error('tiktok') is-invalid @enderror"
                                   id="tiktok" name="tiktok" placeholder="https://tiktok.com/@yourhandle"
                                   value="{{ old('tiktok', $footer->tiktok ?? '') }}">
                            @error('tiktok') <div class="invalid-feedback">{{ $message }}</div> @else
                            <div class="invalid-feedback">Please provide a valid value.</div> @enderror
                        </div>

                        {{-- Address --}}
                        <div class="col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text"
                                   class="form-control @error('address') is-invalid @enderror"
                                   id="address" name="address" placeholder="380 St Kilda Road, Jackson, United States"
                                   value="{{ old('address', $footer->address ?? '') }}">
                            @error('address') <div class="invalid-feedback">{{ $message }}</div> @else
                            <div class="invalid-feedback">Please provide a valid value.</div> @enderror
                        </div>

                        {{-- Phone --}}
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   id="phone" name="phone" placeholder="+1 987 654 3210"
                                   value="{{ old('phone', $footer->phone ?? '') }}">
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @else
                            <div class="invalid-feedback">Please provide a valid value.</div> @enderror
                        </div>

                        {{-- WhatsApp Number (fallback to build wa.me link) --}}
                        <div class="col-md-6">
                            <label for="whatsapp_number" class="form-label">WhatsApp Number</label>
                            <input type="text"
                                   class="form-control @error('whatsapp_number') is-invalid @enderror"
                                   id="whatsapp_number" name="whatsapp_number" placeholder="e.g. +92 300 1234567"
                                   value="{{ old('whatsapp_number', $footer->whatsapp_number ?? '') }}">
                            @error('whatsapp_number') <div class="invalid-feedback">{{ $message }}</div> @else
                            <div class="invalid-feedback">Please provide a valid value.</div> @enderror
                        </div>

                        {{-- Terms (same look & feel as course form) --}}
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                                <div class="invalid-feedback">You must agree before submitting.</div>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="col-12 d-flex gap-2">
                            <button class="btn btn-primary" type="submit">
                                {{ isset($footer) ? 'Update Footer Data' : 'Insert Footer Data' }}
                            </button>
                            <a href="{{ route('admin.footer.index') }}" class="btn btn-outline-secondary">Back to List</a>
                        </div>

                    </form>
                </div><!-- end card-body -->

            </div><!-- end card-->
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

    {{-- Bootstrap client-side validation (same pattern as course page) --}}
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
