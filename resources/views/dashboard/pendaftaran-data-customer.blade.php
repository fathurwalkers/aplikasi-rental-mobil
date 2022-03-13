@extends('layouts.admin-layout')

@push('css')
<style>

</style>
@endpush

@section('content-header', 'Dashboard - Pendaftaran Data Customer')

@section('content-body')
{{-- <div class="container"> --}}

    <div class="card">
        <div class="card-body">

            <form action="{{ route('post-data-customer', $users->id) }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="login_foto">Foto</label>
                            <input type="file" class="form-control-file" id="login_foto" name="login_foto">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="data_nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="data_nama_lengkap" name="login_foto">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="data_jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="data_jenis_kelamin" name="data_jenis_kelamin">
                                <option selected>Pilih jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 mb-2">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                        <button class="btn btn-md btn-info" type="submit">Simpan Data</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

{{-- </div> --}}
@endsection
