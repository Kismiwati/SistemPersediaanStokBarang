@extends('admin.dashboard.index')
@section('title', 'Table')
{{-- @section('sidebar')
<div class=" sidebar" role="navigation ">
    <div class="navbar-collapse">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/admin/barangs" ><i class="fa fa-home nav_icon"></i>Dashboard</a>
                </li>
                <li>
                    <a href="/admin/barang"><i class="fa fas fa-file nav_icon"></i>Data Barang</a>
                </li>
                <li>
                    <a href="/admin/kategori"><i class="fa fa-cogs nav_icon"></i>Jenis Barang</a>
                </li>
                <li>
                    <a href="/admin/warna" ><i class="fa fa-cogs nav_icon"></i>Varian</a>
                </li>
                <li class="active">
                    <a href="/admin/ukuran" class="active"><i class="fa fa-cogs nav_icon"></i>Ukuran</a>
                </li>
                <li >
                    <a href="/admin/masuk" ><i class="fa fa-sign-in nav_icon"></i>Barang Masuk</a>
                    <!-- /nav-second-level -->
                </li>
                <li>
                    <a href="/admin/keluar"><i class="fa fa-sign-out nav_icon"></i>Barang Keluar</a>
                </li>
                <li>
                    <a href="/admin/laporan"><i class="fa fa-book nav_icon"></i>Laporan</a>
                </li>
            </ul>
            <!-- //sidebar-collapse -->
        </nav>
    </div>
</div>
@endsection --}}
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
        	<hr>
    </head>
    </html>
    <center><h2>Laporan</h2></center>
    <table class="table table-bordered" id="example"> 
        <thead>
            <tr>
                <th>No </th>
                <th>Id </th>
                <th>Jenis Barang</th>
                <th>Nama Barang</th>
                <th>Ukuran</th>
                <th>Warna</th>
                <th>Harga</th>
                <th>Jumlah Barang</th>
                </tr>
        </thead>
    <tbody>
        @foreach ($brg as $b)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $b->id }}</td>
            <td>{{$b->id_kategori}}</td>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->ukuran }}</td>
            <td>{{ $b->warna }}</td>
            <td>@currency($b->harga)</td>
            <td>{{ $b->stok }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</div>
@endsection