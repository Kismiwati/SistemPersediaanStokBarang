@extends('admin.dashboard.index')
@section('title', 'Table')
{{-- @section('sidebar')
    <div class=" sidebar" role="navigation ">
        <div class="navbar-collapse">
            <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="/karyawan/barangs"><i class="fa fa-home nav_icon"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="/karyawan/barang"><i class="fa fas fa-file nav_icon"></i>Data Barang</a>
                    </li>
                    <li class="active">
                        <a href="/admin/jenis" class="active"><i class="fa fa-cogs nav_icon"></i>Jenis Barang</a>
                        <!-- /nav-second-level -->
                    </li>
                    <li class="">
                        <a href="/karyawan/masuk"><i class="fa fa-book nav_icon"></i>Barang Masuk</a>
                        <!-- /nav-second-level -->
                    </li>
                    <li>
                        <a href="/karyawan/keluar"><i class="fa fa-th-large nav_icon"></i>Barang Keluar</a>
                    </li>
                    <li>
                        <a href="/admin/laporan"><i class="fa fa-th-large nav_icon"></i>Laporan</a>
                    </li>

                </ul>
                <!-- //sidebar-collapse -->
            </nav>
        </div>
    </div>
@endsection --}}
@section('content')
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <div id="page-wrapper">
        <div class="main-page">
            <div class="tables">
                <div class="bs-example widget-shadow" data-example-id="bordered-table">
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Document</title>
                    </head>

                    </html>
                    <center>
                        <h2>Jenis Pakaian</h2>
                    </center>
                    <a href="/karyawan/kategori/add" class="btn btn-info">Tambah Jenis Barang</a>
                    <br><br>
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Barang</th>
                                <th>Keterangan</th>
                                {{-- <th>Action</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jnbr as $j)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $j->nama_kategori }}</td>
                                    <td>{{ date_format($j->created_at, 'Y-m-d ') }}</td>
                                    {{-- <td>
                                        <a href="/karyawan/edit/{{ $j->id }}" class="btn btn-success">Edit</a>
                                        <button onclick="onDelete({{ $j->id }})"
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
    <script>
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
                window.location.href = '/karyawan/delete/' + id;
                if (result.isConfirmed) {
                    Swal.fire(
                        'Dihapus!',
                        'File Anda telah dihapus.',
                        'Berhasil'
                    )
                }
            })
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

@endsection
