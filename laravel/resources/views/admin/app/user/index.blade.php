@extends('admin.dashboard.index')
@section('title', 'Table')
{{-- @section('sidebar')
<div class=" sidebar" role="navigation ">
    <div class="navbar-collapse">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <ul class="nav" id="side-menu">
                <li >
                    <a href="/karyawan/barangs" ><i class="fa fa-home nav_icon"></i>Dashboard</a>
                </li>
                <li >
                    <a href="/karyawan/barang" ><i class="fa fas fa-file nav_icon"></i>Data Barang</a>
                </li>
                <li>
                    <a href="/karyawan/kategori"><i class="fa fa-cogs nav_icon"></i>Jenis Barang</a>
                    <!-- /nav-second-level -->
                </li>
                <li class="">
                    <a href="/karyawan/masuk"><i class="fa fa-book nav_icon"></i>Barang Masuk</a>
                    <!-- /nav-second-level -->
                </li>
                <li >
                    <a href="/karyawan/keluar"><i class="fa fa-th-large nav_icon"></i>Barang Keluar</a>
                </li>
                <li class="active" >
                    <a href="/admin/laporan" class="active"><i class="fa fa-th-large nav_icon"></i>Laporan</a>
                </li>
                <li >
                    <a href="/admin/user"><i class="fa fa-user nav_icon"></i>Manajemen Admin</a>
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
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="tables">


                <div class="bs-example widget-shadow" data-example-id="bordered-table">
                    <center>
                        <h2>Data User</h2>
                    </center>
                    <html lang="en">

                    </html>
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No </th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Level</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datauser as $u)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->level }}</td>
                                    {{-- <td>
                <a href="/admin/deleteUser/{{ $u->id }}" class="btn btn-danger">Hapus</a>

            </td>             --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
