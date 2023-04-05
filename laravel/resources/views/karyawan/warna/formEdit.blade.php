@extends('karyawan.dashboard.index')
@section('title','FormEdit')
@section('content')
<div class="main-content">
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
                    <div class="form-title">
                        <h4>Form Edit Warna:</h4>
                    </div>
                    <div class="form-body">
                        <form action="{{ url('/karyawan/updateBarangwarna/'.$datawarna->id) }}" role="form" method="POST">
                            @csrf 
                            <div class="form-group"> 
                                <label for="id">Id</label> 
                                <input value="{{ $datawarna->id }}" name="id" type="text" class="form-control" id="id" placeholder=""> 
                            </div> 
                                <div class="form-group"> 
                                    <label for="warna ">warna</label> 
                                    <input  value="{{ $datawarna->warna }}" name="warna" type="text " class="form-control" id="warna " placeholder=""> 
                                </div>
                                <button type="submit" class="btn btn-default">Simpan</button> </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        @endsection

        