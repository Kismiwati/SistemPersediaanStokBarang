@extends('karyawan.dashboard.index')
@section('title','FormEdit')
@section('content')
<div class="main-content">
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
                    <div class="form-body">
                        <form action="{{ url('/karyawan/updateBarangmasuk/'.$datamsk->id) }}" role="form" method="POST">
                            @csrf 
                            <div class="form-group"> 
                                <label for="id">Id</label> 
                                <input value="{{ $datamsk->id }}" name="id" type="text" class="form-control" id="id" placeholder=""> 
                            </div> 
                                <div class="form-group"> 
                                    <label for="id_barang ">Kode Barang</label> 
                                    <input  value="{{ $datamsk->id_barang }}" name="id_barang" type="text " class="form-control" id="id_barang " placeholder="Kode Barang"> 
                                </div>
                                <div class="form-group"> 
                                    <label for="id_user ">Kode User</label> 
                                    <input readonly value="{{ $datamsk->id_user }}" name="id_user" type="text " class="form-control" id="id_user " placeholder="Kode Barang"> 
                                </div>
                                <div class="form-group"> 
                                    <label for="jml_brg_masuk">Jumlah Barang Masuk</label> 
                                    <input value="{{ $datamsk->jml_brg_masuk }}" name="jml_brg_masuk" type="number" class="form-control" id="jml_brg_masuk" placeholder="Kode Barang"> 
                                </div> 
                                <button type="submit" class="btn btn-default">Simpan</button> </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        @endsection

        