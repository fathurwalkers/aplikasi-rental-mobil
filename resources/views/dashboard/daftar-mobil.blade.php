@extends('layouts.admin-layout')

@section('title', 'Daftar Mobil - Dashboard')

@section('content-header', 'Daftar Mobil')

@push('css')
<link rel="stylesheet" href="{{ asset('datatables') }}/datatables.min.css">
<style>
    .modal-backdrop.show {
        display: none !important;
    }
</style>
@endpush

@section('content-body')

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <x-data-table :mobil="$mobil" />
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