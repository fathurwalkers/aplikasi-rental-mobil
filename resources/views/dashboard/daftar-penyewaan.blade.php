@extends('layouts.admin-layout')

@section('title', 'Daftar Kendaraan - Dashboard')

@section('content-header', 'Daftar Kendaraan')

@section('content-header-button')
<button class="btn btn-info btn-md ml-auto mr-2">Tambah Data</button>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('datatables') }}/datatables.min.css">
<style>
    .cke {
        visibility: visible !important;
    }

    .modal-backdrop.show {
        display: none !important;
    }

    .fix-text {
        font-size: 15px;
    }

    table.dataTable tbody th,
    table.dataTable tbody td {
        padding: 8px 10px!important;
        border-color: #d8d8d8!important;
        border-top-color: #d8d8d8!important;
        border-right-color: #d8d8d8!important;
        border-bottom-color: #d8d8d8!important;
        border-left-color: #d8d8d8!important;
        table-layout:fixed!important;
        white-space: nowrap!important;
    }

    .button-text-fix {
        font-size: 11px!important;
    }

    table.dataTable {
        color: rgb(0, 0, 0)!important;
    }
</style>

{{-- CKEditor --}}
<script src="{{ asset('ckeditor') }}/ckeditor.js"></script>

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
                <x-data-table-penyewaan :penyewaan="$penyewaan" />
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('datatables') }}/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable();
    });
</script>
@endpush
