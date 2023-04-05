@extends('admin.dashboard.index')
@section('title', 'Table')
@section('content')
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="page-wrapper">
        <div class="main-page">
            <div class="tables mt-1">
                <div class="bs-example widget-shadow " data-example-id="bordered-table">
                    <center><h2>Data Barang</h2></center>
                    <div class="content">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <div class="card-tools">
                                    <a href="/karyawan/barang/add" class="btn btn-info ">Tambah Barang
                                        {{-- <i>
                                            {{-- class="fas fa-plus-square "> 
                                        </i> --}}
                                    </a>
                                    {{-- <a href="/karyawan/exportpdfdata" class="btn btn-info text-right ">Cetak PDF --}}
                                        {{-- <i
                                            class="fas fa-plus-square"></i> --}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered" id="example" mt-5>
                        <thead>
                            <tr>
                                <th>No </th>
                                <th>Jenis Barang</th>
                                <th>Warna</th>
                                <th>Ukuran</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>foto</th>
                                <th>Stok</th>
                                <th>Keterangan</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brg as $b)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $b->kategori->nama_kategori }}</td>
                                    <td>{{ $b->warna->warna }}</td>
                                    <td>{{ $b->ukuran->nama_ukuran }}</td>
                                    <td>{{ $b->nama_barang }}</td>
                                    <td>{{ $b->satuan }}</td>
                                    <td>@currency($b->harga)</td>
                                    <td><img src="{{ $b->foto }}"  width="50"></td>
                                    <td>{{ $b->stok }}</td>
                                    <td> {{ date_format($b->created_at,"Y-m-d ") }}</td>
                                    <td>
                                        <a href="/karyawan/editBarang/" class="btn btn-success">Edit</a>
                                        <br><br>
                                        <button onclick="onDelete({{ $b->id }})" class="btn btn-danger">Hapus</button>
                                    </td>
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
        function onEdit(id) {
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
            }).then((result) => {
                window.location.href = '/karyawan/editBarang/'+id;
            })
        }
        function onDelete(id) {
            Swal.fire({
                title: 'apakah kamu yakin                                                                                                       ?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                window.location.href = '/karyawan/deleteBarang/'+id;
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
