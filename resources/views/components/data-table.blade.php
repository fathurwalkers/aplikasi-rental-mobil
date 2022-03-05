<div>
    <div class="table-responsive">

        <table id="example1" class="table table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>No</th>
                    <th>Merk</th>
                    <th>Kode</th>
                    <th>Tipe Kendaraan</th>
                    <th>Status</th>
                    <th>Kondisi</th>
                    <th>Jenis Transmisi</th>
                    <th>Harga Sewa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($kendaraan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="">{{ $item->kendaraan_merk }}</td>
                        <td class="">{{ $item->kendaraan_kode }}</td>
                        <td>{{ $item->kendaraan_tipe }}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                    @switch($item->kendaraan_status)
                                        @case("TERSEDIA")
                                            <button class="btn btn-sm btn-success button-text-fix">
                                                TERSEDIA
                                            </button>
                                            @break
                                        @case("RENTAL")
                                            <button class="btn btn-sm btn-info button-text-fix">
                                                DALAM PENYEWAAN
                                            </button>
                                            @break
                                        @case("KOSONG")
                                            <button class="btn btn-sm btn-danger button-text-fix">
                                                TIDAK TERSEDIA
                                            </button>
                                            @break
                                    @endswitch
                                    {{-- <button class="btn btn-sm btn-success">
                                        {{ $item->kendaraan_merk }}
                                    </button> --}}
                                </div>
                            </div>
                        </td>
                        <td>{{ $item->kendaraan_kondisi }}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                    @switch($item->kendaraan_jenis_transmisi)
                                        @case("AUTOMATIC")
                                            <button class="btn btn-sm btn-success button-text-fix">
                                                {{ $item->kendaraan_jenis_transmisi }}
                                            </button>
                                            @break
                                        @case("SEMI-AUTOMATIC")
                                            <button class="btn btn-sm btn-primary button-text-fix">
                                                {{ $item->kendaraan_jenis_transmisi }}
                                            </button>
                                            @break
                                        @case("MANUAL")
                                            <button class="btn btn-sm btn-info button-text-fix">
                                                {{ $item->kendaraan_jenis_transmisi }}
                                            </button>
                                            @break
                                    @endswitch
                                    {{-- <button class="btn btn-sm btn-success">
                                        {{ $item->kendaraan_merk }}
                                    </button> --}}
                                </div>
                            </div>
                        </td>
                        <td class="text-center text-bold">{{ "Rp " . number_format($item->kendaraan_harga_sewa,0,',','.')}}</td>
                        {{-- <td>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto button-text-fix">
                                    <button class="btn btn-sm btn-info">
                                        {{ $item->kendaraan_jenis_body }}
                                    </button>
                                </div>
                            </div>
                        </td> --}}

                        {{-- <td>
                            @foreach ($item->login as $item2)
                                {{ $item2->login_username }}
                            @endforeach
                        </td> --}}

                        <td style="width: 25%">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex mx-auto justify-content-center">

                                    <a class="btn btn-sm btn-info mr-1 rounded button-text-fix" href="#" data-toggle="modal" data-target="#modallihat{{ $item->id }}">
                                        <i class="fas fa-info-circle"></i>
                                        Lihat
                                    </a>

                                    <a class="btn btn-sm btn-primary mr-1 rounded button-text-fix" href="#" data-toggle="modal" data-target="#modalupdate{{ $item->id }}">
                                        <i class="fas fa-cog"></i>
                                        Ubah
                                    </a>

                                    <a href="#" class="btn btn-danger rounded btn-sm button-text-fix" data-toggle="modal" data-target="#modaldelete{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </a>

                                </div>
                            </div>
                        </td>

                    </tr>

                    {{-- MODAL LIHAT --}}
                    <div class="modal fade" id="modallihat{{ $item->id }}" tabindex="1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">Informasi Kendaraan : " {{ $item->kendaraan_merk }} "</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
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
                                        <div class="col-sm-8 col-md-8 col-lg-8">
                                            <h5 class="fix-text">: {{ $item->kendaraan_merk }} </h5 class="fix-text">
                                            <h5 class="fix-text">: {{ $item->kendaraan_harga_sewa }} </h5 class="fix-text">
                                            <h5 class="fix-text">: {{ $item->kendaraan_tipe }} </h5 class="fix-text">
                                            <h5 class="fix-text">: {{ $item->kendaraan_kondisi }} </h5 class="fix-text">
                                            <h5 class="fix-text">: {{ $item->kendaraan_max_mil }} </h5 class="fix-text">
                                            <h5 class="fix-text">: {{ $item->kendaraan_tahun }} </h5 class="fix-text">
                                            <h5 class="fix-text">: {{ $item->kendaraan_jenis_transmisi }} </h5 class="fix-text">
                                            <h5 class="fix-text">: {{ $item->kendaraan_jenis_body }} </h5 class="fix-text">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm-8 col-md-8 col-lg-8">
                                            <h5>Deskripsi : </h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 text-justify">
                                            {!! $item->kendaraan_deskripsi !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn gray btn-info" data-dismiss="modal">TUTUP</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL DELETE --}}
                    <div class="modal fade" id="modaldelete{{ $item->id }}" tabindex="1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Tindakan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">Apakah anda yakin ingin menghapus item ini? </div>
                                <form action="{{ route('hapus-kendaraan', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-footer">
                                        <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-outline-danger" >
                                            Delete
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    {{-- End MODAL DELETE --}}

                    {{-- MODAL UPDATE --}}
                    <div class="modal fade" id="modalupdate{{ $item->id }}" tabindex="1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">Ubah Data Kendaraan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">Silahkan ubah data Kendaraan berikut. </div>
                                <form action="{{ route('update-kendaraan', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="container border-dark">

                                        <div class="row">
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="kendaraan_merk">Merk Kendaraan</label>
                                                    <input type="text" class="form-control" id="kendaraan_merk" placeholder="Masukkan merk kendaraan" name="kendaraan_merk" value="{{ $item->kendaraan_merk }}">
                                                    <small id="kendaraan_merk" class="form-text text-muted">Contoh : DAIHATSU 2022. </small>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="kendaraan_tahun">Tahun</label>
                                                    <input type="number" class="form-control" id="kendaraan_tahun" placeholder="Masukkan merk kendaraan" name="kendaraan_tahun" value="{{ intval($item->kendaraan_tahun) }}">
                                                    <small id="kendaraan_tahun" class="form-text text-muted">Contoh : DAIHATSU 2022. </small>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="kendaraan_harga_sewa">Harga Sewa</label>
                                                    <input type="number" class="form-control" id="kendaraan_harga_sewa" placeholder="Masukkan merk kendaraan" name="kendaraan_harga_sewa" value="{{ $item->kendaraan_harga_sewa }}">
                                                    <small id="kendaraan_harga_sewa" class="form-text text-muted">Contoh : 200000 </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="kendaraan_max_mil">Max Mil Kendaraan</label>
                                                    <input type="number" class="form-control" id="kendaraan_max_mil" placeholder="Masukkan Max Mil kendaraan" name="kendaraan_max_mil" value="{{ $item->kendaraan_max_mil }}">
                                                    <small id="kendaraan_max_mil" class="form-text text-muted">Contoh : 100000 </small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="kendaraan_status">Status Penyewaan</label>
                                                    <select id="kendaraan_status" class="form-control" name="kendaraan_status">
                                                        <option value="{{ $item->kendaraan_status }}" selected>{{ $item->kendaraan_status }}</option>
                                                        <option value="TERSEDIA">Tersedia</option>
                                                        <option value="RENTAL">Dalam Penyewaan</option>
                                                        <option value="KOSONG">Tidak Tersedia</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="kendaraan_tipe">Tipe Kendaraan</label>
                                                    <select id="kendaraan_tipe" class="form-control" name="kendaraan_tipe">
                                                        <option value="{{ $item->kendaraan_tipe }}" selected>{{ $item->kendaraan_tipe }}</option>
                                                        <option value="MOBIL">MOBIL</option>
                                                        <option value="MOTOR">MOTOR</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="kendaraan_kondisi">Kondisi </label>
                                                    <select id="kendaraan_kondisi" class="form-control" name="kendaraan_kondisi">
                                                        <option value="{{ $item->kendaraan_kondisi }}" selected>{{ $item->kendaraan_kondisi }}</option>
                                                        <option value="BAIK">BAIK</option>
                                                        <option value="RUSAK">RUSAK</option>
                                                        <option value="DALAM PERBAIKAN">DALAM PERBAIKAN</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="kendaraan_jenis_transmisi">Jenis Transmisi</label>
                                                    <select id="kendaraan_jenis_transmisi" class="form-control" name="kendaraan_jenis_transmisi">
                                                        <option value="{{ $item->kendaraan_jenis_transmisi }}" selected>{{ $item->kendaraan_jenis_transmisi }}</option>
                                                        <option value="AUTOMATIC">AUTOMATIC</option>
                                                        <option value="SEMI-AUTOMATIC">SEMI-AUTOMATIC</option>
                                                        <option value="MANUAL">MANUAL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="kendaraan_jenis_body">Body Kendaraan</label>
                                                    <select id="kendaraan_jenis_body" class="form-control" name="kendaraan_jenis_body">
                                                        <option value="{{ $item->kendaraan_jenis_body }}" selected>{{ $item->kendaraan_jenis_body }}</option>
                                                        <option value="COMPACT">Compact</option>
                                                        <option value="CONVERTIBLE">Convertible</option>
                                                        <option value="COUPLE">Couple</option>
                                                        <option value="MVP">MVP</option>
                                                        <option value="OFF-ROAD">Off-Road</option>
                                                        <option value="SEDAN">Sedan</option>
                                                        <option value="SEDANO">Sedano</option>
                                                        <option value="STATION WAGON">Station Wagon</option>
                                                        <option value="SUV">SUV</option>
                                                        <option value="TRANSPORTER">Transporter</option>
                                                        <option value="VAN">Van</option>
                                                        <option value="LAINNYA">Lainnya...</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <textarea name="kendaraan_deskripsi" id="editor{{ $item->id }}">
                                                    Tuliskan deskripsi kendaraan...
                                                </textarea>
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
                    {{-- End MODAL UPDATE --}}

                @endforeach

            </tbody>
        </table>

    </div>
</div>
