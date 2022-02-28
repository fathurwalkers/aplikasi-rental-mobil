@extends('layouts.admin-layout')

@section('title', 'Daftar Kendaraan - Dashboard')

@section('content-header', 'Daftar Kendaraan')

@push('css')
<link rel="stylesheet" href="{{ asset('datatables') }}/datatables.min.css">
<style>
    .cke {
        visibility: visible !important;
    }
</style>

{{-- TinyMCE Editor  --}}
{{-- <script src="https://cdn.tiny.cloud/1/0fzrtif8pxlg6kw3rfi13s2t5xzfaiqpavx3fiqci9ysvmva/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}

{{-- CKEditor --}}
<script src="{{ asset('ckeditor') }}/ckeditor.js"></script>

<style>
    .modal-backdrop.show {
        display: none !important;
    }
    .cke {
        visibility: visible !important;
    }
</style>
@endpush

@section('content-body')

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        @if (session('status'))
            <div class="alert alert-info">
                {{ session('status') }}
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <x-data-table :kendaraan="$kendaraan" />
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('datatables') }}/datatables.min.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.document.appendStyleText( '.cke{visibility:hidden;}' );
    $(document).ready(function() {
        $('#example1').DataTable();

    });

    // tinymce.init({
    //   selector: 'textarea',
    //   plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    //   toolbar_mode: 'floating',
    // });
</script>
@endpush
