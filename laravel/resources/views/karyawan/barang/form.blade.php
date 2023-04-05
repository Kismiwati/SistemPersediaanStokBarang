@extends('karyawan.dashboard.index')
@section('title','Form')
@section('content')
<div class="main-content">
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
                    <div class="form-body">
                        <form action="{{ url('/karyawan/barang/createBarang/') }}" role="form" method="POST" enctype="multipart/form-data">
                            @csrf 
                                <div class="form-group"> 
                                    <label for="id_kategori ">Kategori</label> 
                                    {{-- <input name="id_kategori " type="text" class="form-control" id="id_kategori" placeholder="Kode Barang">  --}}
                                    <select name="id_kategori"  class="custom-select form-control">
                                        <option value="Pilih Kategori">Pilih Kategori</option>
                                        @foreach($kategori as $a )
                                        <option value="{{ $a->id }}" >{{ $a->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="id_warna ">Warna</label> 
                                    {{-- <input name="id_warna " type="text" class="form-control" id="id_warna" placeholder="Kode Barang">  --}}
                                    <select name="id_warna"  class="custom-select form-control">
                                        <option value="Pilih Warna">Pilih Warna</option>
                                        @foreach($warna as $w )
                                        <option value="{{ $w->id }}" >{{ $w->warna }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="id_ukuran ">Ukuran</label> 
                                    {{-- <input name="id_ukuran " type="text" class="form-control" id="id_ukuran" placeholder="Kode Barang">  --}}
                                    <select name="id_ukuran"  class="custom-select form-control">
                                        <option value="Pilih Ukuran">Pilih Ukuran</option>
                                        @foreach($ukuran as $u )
                                        <option value="{{ $u->id }}" >{{ $u->nama_ukuran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="nama_barang ">Nama Barang</label> 
                                    <input name="nama_barang" type="text " class="form-control" id="nama_barang " placeholder="Nama Barang"> 
                                </div>
                                <div class="form-group"> 
                                    <label for="satuan ">Satuan</label> 
                                    <input name="satuan" type="text " class="form-control" id="satuan " placeholder=""> 
                                </div>
                                <div class="form-group"> 
                                    <label for="harga ">Harga</label> 
                                    <input name="harga" type="text " class="form-control" id="harga " placeholder=""> 
                                </div>
                                <div class="form-group">
                                    <label for="foto" class="form-label">Gambar</label>
                                    <input name="foto" class="form-control" id="foto" type="file">
                                </div>
                                
                                <button type="submit" class="btn btn-default">Simpan</button> 
                            </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
