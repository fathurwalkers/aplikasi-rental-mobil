<div>
    <table id="example1" class="table table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>No</th>
                <th>Merk</th>
                <th>Tipe Kendaraan</th>
                <th>Kondisi</th>
                <th>Jenis Transmisi</th>
                <th>Tahun</th>
                <th>Tipe</th>
                <th>Jenis Body</th>
                <th>Kelola</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($kendaraan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kendaraan_merk }}</td>
                    <td>{{ $item->kendaraan_tipe }}</td>
                    <td>{{ $item->kendaraan_kondisi }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                @switch($item->kendaraan_jenis_transmisi)
                                    @case("AUTOMATIC")
                                        <button class="btn btn-sm btn-success">
                                            {{ $item->kendaraan_jenis_transmisi }}
                                        </button>
                                        @break
                                    @case("SEMI-AUTOMATIC")
                                        <button class="btn btn-sm btn-primary">
                                            {{ $item->kendaraan_jenis_transmisi }}
                                        </button>
                                        @break
                                    @case("MANUAL")
                                        <button class="btn btn-sm btn-info">
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
                    <td class="text-center" style="width: 10% !important;">{{ $item->kendaraan_tipe_model }}</td>
                    <td>{{ $item->kendaraan_tahun }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                <button class="btn btn-sm btn-info">
                                    {{ $item->kendaraan_jenis_body }}
                                </button>
                            </div>
                        </div>
                    </td>

                    {{-- <td>
                        @foreach ($item->login as $item2)
                            {{ $item2->login_username }}
                        @endforeach
                    </td> --}}

                    <td>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex mx-auto justify-content-center">

                                <a class="btn btn-sm btn-info mr-1 rounded" href="#">
                                    <i class="fas fa-info-circle"></i>
                                    Lihat
                                </a>

                                <a class="btn btn-sm btn-primary mr-1 rounded" href="#">
                                    <i class="fas fa-cog"></i>
                                    Ubah
                                </a>

                                <a href="#" class="btn btn-danger rounded btn-sm" data-toggle="modal" data-target="#modaldelete{{ $item->id }}" >
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </a>

                            </div>
                        </div>
                    </td>

                </tr>

                {{-- MODAL --}}
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
                {{-- End MODAL --}}

            @endforeach

        </tbody>
    </table>
</div>
