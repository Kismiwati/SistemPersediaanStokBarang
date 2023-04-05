@extends('admin.dashboard.index')
@section('title','Form')
@section('content')
<div class="main-content">
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
                    <div class="form-title">
                        <h4>Jenis Barang :</h4>
                    </div>
                    <div class="form-body">
                        <form action="{{ url('/karyawan/kategori/create/') }}" role="form" method="POST">
                            @csrf 
                            <div class="form-group"> 
                                <label for="nama_kategori ">Jenis Barang</label> 
                                <input name="nama_kategori" type="text" class="form-control" id="nama_kategori " placeholder="Masukkan Jenis Barang"> 
                            </div>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
