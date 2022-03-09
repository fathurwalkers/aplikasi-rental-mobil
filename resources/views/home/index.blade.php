@extends('layouts.home-layout')

@section('title', 'Rendra Rental - Home')

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

@push('alert')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@endpush

@section('header-hero')
    <x-home-header-hero />
@endsection

@section('info')
    <x-home-info />
@endsection

@section('home-body')

    <section id="daftar-kendaraan">

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
                            <h4 class="modal-title">Form Penyewaan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">Apakah anda yakin ingin menyewa kendaraan ini?</div>

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

                        <form action="{{ route('proses-penyewaan', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="container border-dark">

                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="rental_durasi">Durasi Penyewaan</label>
                                            <input type="number" class="form-control" id="rental_durasi" placeholder="Durasi penyewaan..." name="rental_durasi">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="rental_satuan_waktu">Satuan Waktu</label>
                                            <select id="rental_satuan_waktu" class="form-control" name="rental_satuan_waktu">
                                                <option selected disabled>Pilih satuan waktu...</option>
                                                <option value="HARI">Hari</option>
                                                <option value="BULAN">Bulan</option>
                                                <option value="JAM">Jam</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn gray btn-danger" data-dismiss="modal">Batalkan</button>
                                <button type="submit" class="btn btn-info" >
                                    Lanjutkan Penyewaan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </section>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
            {{ $kendaraan->onEachSide(0)->links() }}
        </div>
    </div>
@endsection

@section('testimonial')
    {{-- <x-home-testimonial /> --}}
@endsection
