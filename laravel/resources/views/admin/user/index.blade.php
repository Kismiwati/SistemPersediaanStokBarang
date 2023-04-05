@extends('admin.dashboard.index')
@section('title', 'Table')
@section('content')
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
    $('#example').DataTable();
    });
</script>
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
    <body>
        
    </body>
    </html>
    <h4>Data Barang Keluar</h4>
    <a href="/karyawan/keluar/add" class="btn btn-info">Tambah Barang Keluar</a>
    <br><br>
    <table class="table table-bordered" id="example"> 
        <thead>
            <tr>
                <th>Id </th>
                <th>Nama Barang</th>
                <th>User</th>
                <th>Jumlah Barang keluar</th>
                <th>Action</th>

            </tr>
        </thead>
    <tbody>
        @foreach ($datakeluar as $k)
        <tr>
            <td>{{ $k->id}}</td>
            <td>{{ $k->id_barang}}</td>
            <td>{{ $k->id_user  }}</td>
            <td>{{ $k->jml_brg_keluar }}</td>
            <td>
                <a href="/karyawan/editBarangkeluar/{{ $k->id }}" class="btn btn-success">Edit</a>
                <a href="/karyawan/deleteBarangkeluar/{{ $k->id }}" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</div>

@endsection