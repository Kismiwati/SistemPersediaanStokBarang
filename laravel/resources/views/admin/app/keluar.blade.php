@extends('admin.dashboard.index')
@section('title', 'Table')
@section('content')
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
<div class="bs-example widget-shadow" data-example-id="bordered-table"> 

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    @if (session('errors'))
    <div class="alert alert-danger" >
        {{ session('errors')->first() }}
    </div>
    @endif

    <center><h2>Data Barang Keluar</h2></center>
    
    <br><br>
    <div class="content" style="text-align: left;">
        <div class="card card-info card-outline">
            <div class="card-header">
                <div class="card-tools">
                    <a href="/admin/keluar/add" class="btn btn-info text-right">Tambah Barang Keluar</a>
                    <a href="/admin/cetakKeluar" class="btn btn-info text-right ">Cetak PDF<i
                        class="fas fa-plus-square"></i></a>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered" id="example"> 
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>User</th>
                <th>Jumlah Barang keluar</th>
                <th>Keterangan</th>
                <th>Harga satuan</th>
                <th>Total Harga</th>
                {{-- <th>Action</th> --}}

            </tr>
        </thead>
    <tbody>
        @foreach ($datakeluar as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->barang->nama_barang}}</td>
            <td>{{ $k->user->name }}</td>
            <td>{{ $k->jml_brg_keluar }}</td>
            <td>{{ date_format($k->created_at,"Y-m-d ") }}</td>
            <td>@currency($k->barang->harga)</td>
            <td>@currency($k->barang->harga*$k->jml_brg_keluar)</td>
            {{-- <td>
                <button onclick="onDelete({{ $k->id }})" class="btn btn-danger">Hapus</button>
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
                window.location.href = '/karyawan/deleteBarangkeluar/'+id;
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