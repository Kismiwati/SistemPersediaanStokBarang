@extends('karyawan.dashboard.index')
@section('title', 'Table')
@section('content')
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <div id="page-wrapper">
        <div class="main-page">
            <div class="tables">
                <div class="bs-example widget-shadow" data-example-id="bordered-table">
                    <center>
                        <h2>Data Barang Masuk</h2>
                    </center>
                    <br><br>
                    <div class="content" style="text-align: right;">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <div class="card-tools">
                                    <a href="/karyawan/masuk/add" class="btn btn-info text-right">Tambah Barang</a>
                                    <a href="/karyawan/exportpdfmasuk" class="btn btn-info text-right ">Cetak PDF</a>
                                </div>
                            </div>
                            {{-- <div class="car-body">
                                <div class="input-group mb-3">
                                    <label for="label">Tanggal Awal</label>
                                    <input type="date" name="tglawal" id="tglawal" class="form-control" />
                                </div>
                                <div class="input-group mb-3">
                                    <label for="label">Tanggal Akhir</label>
                                    <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
                                </div>
                                <div class="input-group mb-3">
                                    <a href="" onclick="this.href='/karyawan/Pertanggal/'+document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value"  target="_blank" class="btn btn-primary col-md-12" >
                                        Cetak<i class="fas fa print"></i></a>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <br><br>
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>User</th>
                                <th>Jumlah Barang Masuk</th>
                                <th>Keterangan</th>

                                {{-- <th>Action</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datamsk as $m)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $m->barang->nama_barang }}</td>
                                    <td>{{ $m->user->name }}</td>
                                    <td>{{ $m->jml_brg_masuk }}</td>
                                    <td>{{ date_format($m->created_at, 'Y-m-d ') }}</td>

                                    {{-- <td>
                                        <a href="/karyawan/editBarangmasuk/{{ $m->id }}"
                                            class="btn btn-success">Edit</a>
                                        <button onclick="onDelete({{ $m->id }})"
                                            class="btn btn-danger">Hapus</button>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    {{-- <script>
        function onDelete(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus itu!'
            }).then((result) => {
                window.location.href = '/karyawan/deleteBarangmasuk/' + id;
                if (result.isConfirmed) {
                    Swal.fire(
                        'Dihapus!',
                        'File Anda telah dihapus.',
                        'Berhasil'
                    )
                }
            })
        }
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

@endsection
