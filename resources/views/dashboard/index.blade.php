@extends('layouts.admin-layout')

@push('css')
<style>

</style>
@endpush

@section('content-header', 'Dashboard - Index')

@section('content-body')
{{-- <div class="container"> --}}
    @if($users->level == "admin")
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
                            {{ $kendaraan }}
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
                            {{ $data }}
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
                            {{ $rental }}
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
                            <h4>User</h4>
                        </div>
                        <div class="card-body">
                            {{ $login }}
                        </div>
                </div>
                </div>
            </div>

        </div>
    @endif

    @if($users->level == "customer")
        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Kendaraan</h4>
                        </div>
                        <div class="card-body">
                            {{ $kendaraan }}
                        </div>
                </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Customer</h4>
                        </div>
                        <div class="card-body">
                            {{ $data }}
                        </div>
                </div>
                </div>
            </div>

        </div>
    @endif

{{-- </div> --}}
@endsection
