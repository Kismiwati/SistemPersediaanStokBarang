@extends('admin.dashboard.index')
@section('title', 'Table')
@section('content')
    <div id="page-wrapper">
        <div class="main-page">
            <div class="row-one">
                <div class="col-md-4 widget">
                    <div class="stats-left ">
                        <h5>Total Harga Barang</h5>
                        <h4>Masuk</h4>
                    </div>
                    <div class="stats-right">
                        <label>{{ DB::table('brg_masuk')->sum('jml_brg_masuk') }}</label>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="col-md-4 widget states-mdl">
                    <div class="stats-left">
                        <h5>Total Harga Barang</h5>
                        <h4>Keluar</h4>
                    </div>
                    <div class="stats-right">
                        <label>{{ DB::table('brg_keluar')->sum('jml_brg_keluar') }}</label>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="row calender widget-shadow">
                <h4 class="title">Calender</h4>
                <div class="cal1">

                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
@endsection
