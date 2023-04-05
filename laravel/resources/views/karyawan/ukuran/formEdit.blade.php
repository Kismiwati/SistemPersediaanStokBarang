@extends('karyawan.dashboard.index')
@section('title','FormEdit')
@section('content')
<div class="main-content">
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
                    <div class="form-title">
                        <h4>Form Edit Ukuran:</h4>
                    </div>
                    <div class="form-body">
                        <form action="{{ url('/karyawan/updateBarangukuran/'.$dataukuran->id) }}" role="form" method="POST">
                            @csrf 
                            <div class="form-group"> 
                                <label for="id">Kode Ukuran</label> 
                                <input value="{{ $dataukuran->id }}" name="id" type="text" class="form-control" id="id" placeholder=""> 
                            </div> 
                                <div class="form-group"> 
                                    <label for="nama_ukuran ">Ukuran</label> 
                                    <input  value="{{ $dataukuran->nama_ukuran }}" name="nama_ukuran" type="text " class="form-control" id="ukuran " placeholder=""> 
                                </div>
                                <button type="submit" class="btn btn-default">Simpan</button> </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        @endsection

        