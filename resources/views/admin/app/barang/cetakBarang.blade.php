
@extends('admin.dashboard.index')
@section('title', 'Table')
@section('content')
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <div id="page-wrapper">
        <div class="main-page">
            <div class="tables">
                <div class="form-group">
                    <p align="center"><b>Laporan Data Barang Masuk</b></p>
            
                    <div class="content">
                        <div class="card card-info card-outline">
                            <div class="car-body">
                                <div class="input-group mb-3">
                                    <label for="label">Tanggal Awal</label>
                                    <input type="date" name="tglawal" id="tglawal" class="form-control" />
                                </div>
                                <div class="input-group mb-3">
                                    <label for="label">Tanggal Akhir</label>
                                    <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
                                </div>
                                <div class="input-group mb-3">
                                    <a href="" onclick="this.href='/admin/barang/Pertanggal/'+document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value"  target="_blank" class="btn btn-primary col-md-10" >
                                        Cetak<i class="fas fa print"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

@endsection
