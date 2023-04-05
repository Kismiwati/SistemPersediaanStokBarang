@extends('karyawan.dashboard.index')
@section('title','Form')
@section('content')
<div class="main-content">
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
                    <div class="form-body">
                        <form action="{{ url('/karyawan/updateBarang/'.$brg->id) }}" role="form" method="POST" enctype="multipart/form-data">
                            @csrf 

                            <div class="form-group">
                                <label for="id">Kode Barang</label>
                                <input readonly value="{{ $brg->id }}" type="text" name="id" class="form-control" id="id"  placeholder="">
                            </div>
                                <div class="form-group"> 
                                    <label for="id_kategori ">Kategori</label> 
                                    <select readonly name="id_kategori"  class="custom-select form-control">
                                        @foreach($kategori as $k )
                                        <option value="{{ $k->id }}" >{{ $k->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="id_warna">Warna</label> 
                                    <input readonly value="{{ $brg->id_warna }}" name="id_warna" type="text " class="form-control" id="id_warna " > 
                                    {{-- <label for="id_warna ">Warna</label> 
                                    <select name="id_warna"  class="custom-select form-control">
                                        @foreach($warna as $w )
                                        <option value="{{ $w->id }}" >{{ $w->warna}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="form-group"> 
                                    <label for="id_ukuran ">Ukuran</label> 
                                    <input readonly value="{{ $brg->id_ukuran }}" name="id_ukuran" type="text " class="form-control" id="id_ukuran " > 
                                
                                    {{-- <label for="id_ukuran ">Ukuran</label> 
                                    <select name="id_ukuran"  class="custom-select form-control">
                                        @foreach($ukuran as $u )
                                        <option value="{{ $u->id }}" >{{ $u->nama_ukuran }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="form-group"> 
                                    <label for="nama_barang ">Nama Barang</label> 
                                    <input value="{{ $brg->nama_barang }}" name="nama_barang" type="text " class="form-control" id="nama_barang " placeholder="Masukkan Nama Barang"> 
                                </div>
                                <div class="form-group"> 
                                    <label for="satuan ">Satuan</label> 
                                    <input value="{{ $brg->satuan }}" name="satuan" type="text " class="form-control" id="satuan " placeholder="Masukkan Nama Barang"> 
                                </div>
                                <div class="form-group"> 
                                    <label for="harga ">Harga</label> 
                                    <input value="{{ $brg->harga }}" name="harga" type="text " class="form-control" id="harga " placeholder="Masukkan Harga Barang"> 
                                </div>
                                <div class="form-group">
                                    <label for="foto" class="form-label">Gambar</label>
                                    <img src="{{ $brg->foto }}" width="100">
                                    <input value="{{ $brg->foto }}" name="foto" class="form-control" id="foto" type="file">
                                </div>
                                <button type="submit" onclick="onEdit()" class="btn btn-default">Submit</button> 
                            </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function onEdit(id){
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Data Berhasil Diubah',
    showConfirmButton: false,
    timer: 1500
    }).then((result) => {
                window.location.href = '/karyawan/barangs/'+id;
            })
}
</script>
@endsection

