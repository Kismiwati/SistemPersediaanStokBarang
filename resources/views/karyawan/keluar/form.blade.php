@extends('karyawan.dashboard.index')
@section('title','Form')
@section('content')
<div class="main-content">
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
                    <div class="form-body">
                        <form action="{{ url('/karyawan/keluar/createBarang/') }}" role="form" method="POST">
                            @csrf 
                            
                                <div class="form-group"> 
                                    <label for="id_barang ">Barang</label> 
                                    <select name="id_barang"  class="custom-select form-control">
                                        <option value="Pilih Barang">Pilih Barang</option>
                                        @foreach($barang as $b )
                                        <option value="{{ $b->id }}" >{{ $b->nama_barang }} - ({{ $b->kategori->nama_kategori }}, {{ $b->warna->warna }}, {{ $b->ukuran->nama_ukuran }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="id_user ">User</label> 
                                    <input readonly value="{{session('name') }}" name="id_user" type="text" class="form-control" id="id_user" placeholder=""> 
                                    {{-- <label for="id_user ">User</label> 
                                    <select name="id_user"  class="custom-select form-control">
                                        @foreach($user as $u )
                                        <option value="{{ $u->id }}" >{{ $u->name }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                 <div class="form-group"> 
                                    <label for="jml_brg_keluar">Jumlah Barang Keluar</label> 
                                    <input min="0" name="jml_brg_keluar" type="number" class="form-control" id="jml_brg_keluar" placeholder="Masukkan Jumlah Barang Keluar"> 
                                </div> 
                                
                                <button type="submit" class="btn btn-default">Simpan</button> </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection