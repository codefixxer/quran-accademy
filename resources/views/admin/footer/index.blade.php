@extends('admin.layouts.app')

@section('title', 'Footer List')

@section('links')
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assetss/images/favicon.ico') }}">

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

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Footer Data</h5>
                        <a href="{{ route('admin.footer.create') }}" class="btn btn-primary">
                            <i class="uil uil-plus"></i> Insert New Footer Data
                        </a>
                    </div>

                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Phone</th>
                                    <th>WhatsApp No.</th>
                                    <th>Facebook</th>
                                    <th>Instagram</th>
                                    <th>TikTok</th>
                                    <th>Address</th>
                                    <th style="width:120px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($footers as $footer)
                                    @php
                                        $limit = fn($v) => \Illuminate\Support\Str::limit($v ?? '', 28);
                                        $safeUrl = function ($v) {
                                            if (!filled($v)) return null;
                                            return preg_match('~^https?://~i', $v) ? $v : 'https://' . ltrim($v, '/');
                                        };
                                        // Build wa.me from whatsapp_number if whatsapp URL empty
                                        $waUrl = null;
                                        if (filled($footer->whatsapp) && preg_match('~^(https?://|whatsapp://|https://wa\.me/|https://api\.whatsapp\.com/)~i', $footer->whatsapp)) {
                                            $waUrl = $footer->whatsapp;
                                        } elseif (filled($footer->whatsapp_number)) {
                                            $digits = preg_replace('/\D+/', '', $footer->whatsapp_number);
                                            if (filled($digits)) $waUrl = 'https://wa.me/' . $digits;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $footer->id }}</td>
                                        <td>
                                            @if(filled($footer->phone))
                                                <a href="tel:{{ preg_replace('/\s+/', '', $footer->phone) }}">{{ $footer->phone }}</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if(filled($footer->whatsapp_number))
                                                @if($waUrl)
                                                    <a href="{{ $waUrl }}" target="_blank" rel="noopener">{{ $footer->whatsapp_number }}</a>
                                                @else
                                                    {{ $footer->whatsapp_number }}
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if($safeUrl($footer->facebook))
                                                <a href="{{ $safeUrl($footer->facebook) }}" target="_blank" rel="noopener">{{ $limit($footer->facebook) }}</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($safeUrl($footer->instagram))
                                                <a href="{{ $safeUrl($footer->instagram) }}" target="_blank" rel="noopener">{{ $limit($footer->instagram) }}</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($safeUrl($footer->tiktok))
                                                <a href="{{ $safeUrl($footer->tiktok) }}" target="_blank" rel="noopener">{{ $limit($footer->tiktok) }}</a>
                                            @endif
                                        </td>
                                        <td>{{ $limit($footer->address) }}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('admin.footer.edit', $footer->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.footer.delete', $footer->id) }}" method="POST" onsubmit="return confirm('Delete this footer entry?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div><!-- end card-body -->

                </div><!-- end card -->
            </div><!-- end col-12 -->
        </div><!-- end row -->

    </div><!-- end content -->
</div><!-- end content-page -->
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
    <script src="{{ asset('assetss/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assetss/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js') }}"></script>

    <!-- Datatable Init (simple) -->
    <script>
        $(function () {
            $('#datatable').DataTable({
                pageLength: 10,
                order: [[0, 'desc']],
                columnDefs: [
                    { orderable: false, targets: -1 } // actions column
                ]
            });
        });
    </script>

    <!-- App js-->
    <script src="{{ asset('assetss/js/app.js') }}"></script>
@endsection
