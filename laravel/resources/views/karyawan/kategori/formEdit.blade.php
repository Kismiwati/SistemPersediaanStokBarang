@extends('karyawan.dashboard.index')
@section('title','Form')
@section('content')
<div class="main-content">
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
                    <div class="form-title">
                        <h4>Basic Form :</h4>
                    </div>
                    <div class="form-body">
                        <form action="{{ url('/karyawan/update/'.$jnbr->id) }}" role="form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input value="{{ $jnbr->id }}" type="text" name="id" class="form-control" id="id" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="id">Kode Jenis Barang</label>
                                <input disabled value="{{ $jnbr->id }}" type="text" name="id" class="form-control" id="id" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="nama_kategori">Jenis Brang</label>
                                <input value="{{ $jnbr->nama_kategori }}" type="text" name="nama_kategori" class="form-control" id="nama_kategori" placeholder="">
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

