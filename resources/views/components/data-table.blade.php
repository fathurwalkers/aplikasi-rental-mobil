<div>
    <table id="example1" class="table table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Pendaftaran</th>
                <th>Pembayaran</th>
                {{-- <th>Akun</th> --}}
                <th>Kelola</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($mobil as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Str::limit($item->mobil_merk, 15) }}</td>
                    <td>{{ $item->mobil_merk }}</td>
                    <td class="text-center" style="width: 10% !important;">{{ $item->mobil_merk }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                {{-- @switch($item->mobil_merk)
                                    @case("BELUM DISETUJUI")
                                        <button class="btn btn-sm btn-danger">
                                            {{ $item->mobil_merk }}
                                        </button>
                                        @break
                                    @case("DISETUJUI")
                                        <button class="btn btn-sm btn-success">
                                            {{ $item->mobil_merk }}
                                        </button>
                                        @break
                                @endswitch --}}
                                <button class="btn btn-sm btn-success">
                                    {{ $item->mobil_merk }}
                                </button>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                {{-- @switch($item->data_status_pembayaran)
                                    @case("DIPROSES")
                                        <button class="btn btn-sm btn-info">
                                            {{ $item->data_status_pembayaran }}
                                        </button>
                                        @break
                                    @case("SELESAI")
                                        <button class="btn btn-sm btn-success">
                                            {{ $item->data_status_pembayaran }}
                                        </button>
                                        @break
                                    @case("DIBATALKAN")
                                        <button class="btn btn-sm btn-danger">
                                            {{ $item->data_status_pembayaran }}
                                        </button>
                                        @break
                                @endswitch --}}
                                <button class="btn btn-sm btn-danger">
                                    {{ $item->mobil_merk }}
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
                            {{-- <form action="" method="POST" enctype="multipart/form-data"> --}}
                                {{-- @csrf --}}
                                <div class="modal-footer">
                                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-danger" >
                                        Delete
                                    </button>
                                </div>
                            {{-- </form> --}}

                        </div>
                    </div>
                </div>
                {{-- End MODAL --}}

            @endforeach

        </tbody>
    </table>
</div>
