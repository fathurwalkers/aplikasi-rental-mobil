@extends('layouts.home-layout')

@push('css')
    <style>
        .img-fix {
            width: 100%!important; /* You can set the dimensions to whatever you want */
            height: 160px!important;
            object-fit: cover!important;
        }
        .fix-text {
            font-size: 14px;
        }
    </style>
@endpush

@section('home-body')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
        <h2 class="section-heading text-center"><strong>Daftar Kendaraan</strong></h2>
        <p class="mb-5 text-center">Pilih kendaraan yang ingin anda Sewa</p>
    </div>
</div>


<div class="row">

    @foreach ($kendaraan as $item)
    <div class="col-md-4 col-lg-4 mb-4">
        <div class="listing d-block  align-items-stretch">
            <div class="listing-img h-100 mr-4">
                <img src="{{ asset('default-img') }}/{{ $item->kendaraan_foto }}" alt="Image" class="img img-fix">
            </div>
            <div class="listing-contents h-100">
                <h3>{{ $item->kendaraan_merk }}</h3>
                <div class="rent-price">
                    <strong>{{ "Rp " . number_format($item->kendaraan_harga_sewa,0,',','.')}} </strong><span class="mx-1">/</span>day
                </div>
                <div class="d-block d-md-flex mb-3 border-bottom pb-4 mb-2">
                    <div class="listing-feature pr-4">
                        <span class="caption">Transmisi :</span>
                        <span class="number">{{ $item->kendaraan_jenis_transmisi }}</span>
                    </div>
                    <div class="listing-feature pr-4">
                        <span class="caption">Body :</span>
                        <span class="number">{{ $item->kendaraan_jenis_body }}</span>
                    </div>
                    <div class="listing-feature pr-4">
                        <span class="caption">Tipe :</span>
                        <span class="number">{{ $item->kendaraan_tipe }}</span>
                    </div>
                </div>
                <div>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem quibusdam.</p> --}}
                    <p><a href="#" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#modalpenyewaan{{ $item->id }}">Rental sekarang</a></p>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL PENYEWAAN --}}
    <div class="modal fade" id="modalpenyewaan{{ $item->id }}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Kendaraan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">Silahkan ubah data Kendaraan berikut. </div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-md-2 col-lg-2">

                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <h5 class="fix-text">Merk </h5 class="fix-text">
                            <h5 class="fix-text">Harga Sewa </h5 class="fix-text">
                            <h5 class="fix-text">Tipe Kendaraan </h5 class="fix-text">
                            <h5 class="fix-text">Kondisi </h5 class="fix-text">
                            <h5 class="fix-text">Max Mil </h5 class="fix-text">
                            <h5 class="fix-text">Tahun </h5 class="fix-text">
                            <h5 class="fix-text">Jenis Transmisi </h5 class="fix-text">
                            <h5 class="fix-text">Jenis Body </h5 class="fix-text">
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <h5 class="fix-text">: {{ $item->kendaraan_merk }} </h5 class="fix-text">
                            <h5 class="fix-text">: {{ "Rp " . number_format($item->kendaraan_harga_sewa,0,',','.')}} </h5 class="fix-text">
                            <h5 class="fix-text">: {{ $item->kendaraan_tipe }} </h5 class="fix-text">
                            <h5 class="fix-text">: {{ $item->kendaraan_kondisi }} </h5 class="fix-text">
                            <h5 class="fix-text">: {{ $item->kendaraan_max_mil }} </h5 class="fix-text">
                            <h5 class="fix-text">: {{ $item->kendaraan_tahun }} </h5 class="fix-text">
                            <h5 class="fix-text">: {{ $item->kendaraan_jenis_transmisi }} </h5 class="fix-text">
                            <h5 class="fix-text">: {{ $item->kendaraan_jenis_body }} </h5 class="fix-text">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">

                        </div>
                    </div>
                </div>

                <form action="{{ route('update-kendaraan', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="container border-dark">

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="kendaraan_merk">Merk Kendaraan</label>
                                    <input type="text" class="form-control" id="kendaraan_merk" placeholder="Masukkan merk kendaraan" name="kendaraan_merk">
                                    <small id="kendaraan_merk" class="form-text text-muted">Contoh : DAIHATSU 2022. </small>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn gray btn-danger" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-info" >
                            Ubah
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @endforeach

</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
        {{ $kendaraan->onEachSide(0)->links() }}
    </div>
</div>
@endsection
