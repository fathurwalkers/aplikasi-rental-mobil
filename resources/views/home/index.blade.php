@extends('layouts.home-layout')

@push('css')
    <style>
        .img-fix {
            width: 100%!important; /* You can set the dimensions to whatever you want */
            height: 170px!important;
            object-fit: cover!important;
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
                    <strong>Rp. {{ $item->kendaraan_harga_sewa }}</strong><span class="mx-1">/</span>day
                </div>
                <div class="d-block d-md-flex mb-3 border-bottom pb-3">
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
                    <p><a href="#" class="btn btn-primary btn-sm">Pesan sekarang</a></p>
                </div>
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
