<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masuk;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Keluar;

class LaporanController extends Controller
{
    public function lapMasuk(Masuk $masuk)
    {
        $masuk = Masuk::all();
        // $masukData = $masuk->with('warna', 'kategori', 'ukuran')->get();
        return view('admin.laporanmasuk.index', compact('masuk'));
    }

    public function cetakMasuk()
    {
        $masuk = Masuk::all();
        return view('admin.laporanmasuk.cetak', compact('masuk'));
    }
}
