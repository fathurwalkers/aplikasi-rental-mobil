<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('print') }}/css/style.css">
    <title>Document</title>
</head>


{{-- <body onload="window.print()"> --}}
<body>
    <div class="container">
        <div class="header" style="display: flex; justify-content: space-between;">
            <div class="company-info">
                <div class="comp-name">
                    <h1 style="font-style: italic;">RR</h1>
                    <p style="color: rgba(126, 126, 126, 0.74);">RENDRA RENTAL</p>
                </div>
                <div class="comp-address">
                    <small>Jl. Raya Palagimata, Ruko Perempatan Rau, Wameo, Kecamatan Batu Poaro, Kota Baubau, Sulawesi Tenggara</small>
                    <small>No. HP / Telepon : (+62) 822 - 1566 - 8874</small>
                    <small>E-mail : layametravel@gmail.com</small>
                </div>
            </div>
            <div class="invoice">
                <div class="invoice-header">
                    <h2>TANDA PENYEWAAN</h2>
                </div>
                <div class="invoice-name">

                    @switch($penyewaan->data->data_jenis_kelamin)
                        @case("L")
                        <p>Bapak {{ $penyewaan->data->data_nama_lengkap }}</p>
                            @break
                        @case("P")
                        <p>Ibu {{ $penyewaan->data->data_nama_lengkap }}</p>
                            @break
                    @endswitch
                    <small>Kota Baubau</small>
                </div>
                <div class="invoice-info" style="margin-top: 10px; font-weight: bold;">
                    <p>Kode Penyewaan : {{ strtoupper($penyewaan->rental_kode) }}</p>
                    <p>Tgl. Penyewaan : {{ date('d-m-Y', strtotime($penyewaan->updated_at)) }}</p>
                </div>
            </div>
        </div>
        <div class="content">
            <table border="1" style="border-collapse: collapse; border-spacing: 1;width:100%;">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tgl</th>
                        <th>Pax</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">
                            <p style="margin-top: -95px;">1.</p>
                        </td>
                        <td style="text-align: center;">
                            <p style="margin-top: -95px;">{{ date('d/m/Y', strtotime($penyewaan->created_at)) }}</p>
                        </td>
                        <td></td>
                        <td style="padding: 0px 0px;">

                            <!-- klien info -->
                            <table class="client-info" style="margin-top: 15px;">
                                <tr>
                                    <td class="client-name" style="padding-right: 10px;">Nama Klien</td>
                                    <td class="client-name">:</td>
                                    <td class="client-name" style="font-weight: bold;">Bapak Hakim</td>
                                </tr>
                                <tr>
                                    <td>Layanan</td>
                                    <td>:</td>
                                    <td>Rental Mobil Toyota Avanza</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>:</td>
                                    <td>Paket
                                        @switch($penyewaan->rental_satuan_waktu)
                                            @case("BULAN")
                                                Bulanan
                                                @break
                                            @case("HARI")
                                                Harian
                                                @break
                                        @endswitch
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($penyewaan->kendaraan->kendaraan_harga_sewa,0,',','.')}},- x {{ $penyewaan->rental_durasi }} /
                                        @switch($penyewaan->rental_satuan_waktu)
                                            @case("BULAN")
                                                Bulan
                                                @break
                                            @case("HARI")
                                                Hari
                                                @break
                                        @endswitch
                                    </td>
                                </tr>
                            </table>


                            <!-- services -->
                            <div style="padding: 0 2px; margin-top: 20px;">
                                <p style="text-decoration: underline;">Harga sudah termasuk :</p>
                                <p>
                                    <ol style="margin-left: 15px; padding-left: 1.5px;">
                                        <li>Mobil dan Sopir</li>
                                    </ol>
                                </p>
                            </div>

                            <div style="padding: 0 2px; margin-top: 20px;">
                                <p style="text-decoration: underline;">Harga tidak termasuk :</p>
                                <p>
                                    <ol style="margin-left: 15px;padding-left: 1.5px;">
                                        <li>Makan Sopir</li>
                                        <li>BBM Selama masa sewa</li>
                                        <li>Penginapan sopir diluar kota padang</li>
                                        <li>Parkir Kendaraan</li>
                                        <li>Tips Sopir</li>
                                    </ol>
                                </p>
                            </div>

                            <div class="price-info" style="text-align: end; font-style: italic; padding-right: 5px; margin-top: 15px;">
                                <p>Total</p>
                                <p>deposite</p>
                                <p>sisa</p>
                            </div>
                        </td>
                        <td>
                            <div class="price" style="margin-top: -95px; text-align: center;">
                                <p>Rp {{ number_format($penyewaan->rental_total_harga,0,',','.')}}</p>
                            </div>
                            <div class="total" style="transform: translateY(208px);">
                                <p
                                    style="display: flex; justify-content: space-between; padding: 0 3px; border-top: 3px solid black;">
                                    <font>Rp.</font>
                                    <font>{{ number_format($penyewaan->rental_total_harga,0,',','.')}}</font>
                                </p>
                                <p
                                    style="display: flex; justify-content: space-between; padding: 0 3px;border-bottom: 1.5px solid black;">
                                    <font>Rp.</font>
                                    <font>-</font>
                                </p>
                                <p
                                    style="display: flex; justify-content: space-between; padding: 0 3px;border-top: 1.5px solid black; margin-top: 1.5px;">
                                    <font>Rp.</font>
                                    <font>{{ number_format($penyewaan->rental_total_harga,0,',','.')}}</font>
                                </p>
                            </div>
                        </td>
                    </tr>
                    {{-- <tr>
                        <td colspan="5" style="padding: 18px 4px; font-weight: bold;">
                            <p>Terbilang:Tiga Ratus Lima Puluh Ribu Rupiah</p>
                        </td>
                    </tr> --}}
                    {{-- <tr>
                        <td colspan="5">
                            <div class="pay" style="display: flex;">
                                <div class="bank-1" style="border-right: 1px solid black; padding-left: 5px; padding-right: 100px;">
                                    <h4>Bank Transfer 1 :</h4>
                                    <p>Bank BNI Cab. Padang</p>
                                    <p>A/c Nama: Rendra Rental</p>
                                    <p>A/c No: <font>270277575</font></p>
                                </div>
                                <div class="bank-1" style="padding-left: 60px;">
                                    <h4>Bank Transfer 2 :</h4>
                                    <p>Bank Central Asia (BCA) Kcu. Padang</p>
                                    <p>A/c Nama : <font>Awal ganteng</font></p>
                                    <p>A/c No: <font>0321496520</font></p>
                                </div>

                            </div>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
        <div class="footer">
            <div class="footer-head">
                <p>Hormat Kami</p>
                <h4>RENDRA RENTAL</h4>
            </div>
            <div class="footer-sign" style="padding: 20px 0px;">

            </div>
            <div class="footer-foot">
                <p>Petugas Penyewaan</p>
            </div>
        </div>
    </div>
</body>

</html>
