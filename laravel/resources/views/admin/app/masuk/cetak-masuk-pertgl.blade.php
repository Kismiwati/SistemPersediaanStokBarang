<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Data Barang Keluar </title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Barang Masuk</b></p>

        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>User</th>
                <th >Jumlah Barang Masuk</th>
                <th >Harga satuan</th>
                <th>Keterangan</th>
                <th >Total Harga</th>
            </tr>
        

            @foreach ( $cetakPertanggal as $dt)
                <tr align="center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dt->barang->nama_barang}}</td>
                    <td>{{ $dt->user->name }}</td>
                    <td >{{ $dt->jml_brg_masuk }}</td>
                    <td>@currency($dt->barang->harga)</td>
                    <td>{{ date_format($dt->created_at,"Y-m-d ") }}</td>
                    <td>@currency($dt->barang->harga*$dt->jml_brg_masuk)</td>
                </tr>
            @endforeach
            <tr align="center">
                <td colspan="6">Total</td>
                <td>@currency($jumlah)</td>

            </tr>
        </table>
    </div>
</body>
</html>