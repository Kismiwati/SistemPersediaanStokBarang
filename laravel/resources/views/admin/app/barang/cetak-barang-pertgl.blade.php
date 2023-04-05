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
        <p align="center"><b>Laporan Data Barang</b></p>

        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No </th>
                <th>Jenis Barang</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>foto</th>
                <th>Stok</th>
                <th>Keterangan</th>
            </tr>

            @foreach ($cetakPertanggal as $b)
                <tr align="center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->kategori->nama_kategori }}</td>
                    <td>{{ $b->warna->warna }}</td>
                    <td>{{ $b->ukuran->nama_ukuran }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>{{ $b->satuan }}</td>
                    <td>@currency($b->harga)</td>
                    <td><img src="{{ $b->foto }}" width="50"></td>
                    <td>{{ $b->stok }}</td>
                    <td> {{ date_format($b->created_at, 'Y-m-d ') }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
