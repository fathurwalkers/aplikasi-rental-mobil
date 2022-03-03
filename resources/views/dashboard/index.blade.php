@extends('layouts.admin-layout')

@push('css')
<style>

</style>
@endpush

@section('content-header', 'Dashboard - Index')

@section('content-body')
{{-- <div class="container"> --}}
    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-3 col-3">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Kendaraan</h4>
                    </div>
                    <div class="card-body">
                        10
                    </div>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-3">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Customer</h4>
                    </div>
                    <div class="card-body">
                        10
                    </div>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-3">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                        {{-- <i class="far fa-car"></i> --}}
                        <i class="fas fa-indent"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Penyewaan</h4>
                    </div>
                    <div class="card-body">
                        10
                    </div>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-3">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                        {{-- <i class="far fa-car"></i> --}}
                        <i class="fas fa-file-contract"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Laporan</h4>
                    </div>
                    <div class="card-body">
                        10
                    </div>
              </div>
            </div>
        </div>

    </div>
{{-- </div> --}}
@endsection
