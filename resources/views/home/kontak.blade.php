@extends('layouts.home-layout')

@section('title', 'Rendra Rental - Contact')

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
<div class="site-section bg-light" id="contact-section">
    <div class="container">

        <div class="row justify-content-center text-center">
            <div class="col-7 text-center mb-3">
                <h2>Kontak Kami</h2>
                <p>Untuk pelayanan dan pengaduan, anda bisa menghubungi kami pada kontak yang tertera dibawah ini. </p>
            </div>
        </div>

        <div class="row">

            {{-- <div class="col-lg-8 mb-3" >
                <form action="#" method="post">
                    <div class="form-group row">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Email address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea name="" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 mr-auto">
                            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
                        </div>
                    </div>
                </form>
            </div> --}}

            <div class="col-lg-12 mx-auto">
                <div class="bg-white p-3 p-md-5">
                    <h3 class="text-black mb-4">Contact Info</h3>
                    <ul class="list-unstyled footer-link">
                        <li class="d-block mb-3">
                            <span class="d-block text-black">Address:</span>
                            <span>34 Street Name, City Name Here, United States</span></li>
                        <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+1 242 4942 290</span></li>
                        <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>info@yourdomain.com</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
