<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Keluar;
use App\Models\Masuk;
use App\Models\Ukuran;
use App\Models\Warna;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index(Barang $barang)
    {
        $barangData = $barang->with('warna', 'kategori', 'ukuran')->get();
        // foreach($barangData as $a){
        //     $a->id_warna = Warna::find($a->id_warna);
        //     $a->id_kategori = Kategori::find($a->id_kategori)->nama_kategori;
        //     $a->id_ukuran = Ukuran::find($a->id_ukuran);

        // }
        $brg = [
            'brg' => $barangData,
        ];

        // dd($brg);

        if (session('level') == "karyawan") {
            return view('karyawan.app.index', $brg);
        }
        if (session('level') == "admin") {
            return view('admin.app.index', $brg);
        }
    }

    public function indexs(Barang $barang)
    {
        $barangData = $barang->with('warna', 'kategori', 'ukuran')->get();
        // foreach($barangData as $a){
        //     // panggil procedure hitung stok
        //     $hitungStok = DB::select(DB::raw('CALL hitungStok('.$a->id.', @stok);'));
        //     // panggil hasil nilai kembalian dari procedure hitungstok
        //     $hasil = DB::select(DB::raw('SELECT @stok'));
        //     // ambil datanya dari @stok
        //     $a->stok =json_decode( json_encode($hasil[0]), true)['@stok'];
        //     $a->id_kategori = Kategori::find($a->id_kategori)->nama_kategori;
        // }
        $barangData = $barang->with('warna', 'kategori', 'ukuran')->get();
        $brg = [
            'brg' => $barangData,
        ];
        // $brg = DB::table('barang')->join('brg_masuk', 'barang.id','=', 'brg_masuk.id')->get();

        if (session('level') == "karyawan") {
            return view('karyawan.barang.index', $brg);
        }
        if (session('level') == "admin") {
            return view('admin.app.index', $brg);
        }
    }

    // public function create(Request $request, Barang $barang)
    // {
    //     $file= $request->file('foto');
    //     $validator = Validator::make($request->all(), [
    //         'id' => 'required',
    //         'id_kategori' => 'required',
    //         'nama_barang ' => 'required',
    //         'ukuran ' => 'required',
    //         'warna ' => 'required',
    //         'harga ' => 'required',
    //         'foto ' => 'required'

    //     ]);

    //     if ($validator->failed()) {
    //         return response()->json([
    //             'error' => $validator->errors()
    //         ], 422);
    //     }
    //     $file= $request->file('foto');
    //     $nama_file = $file->getClientOriginalName();
    //     $request->file('foto')->storeAs('ImageUpload/', $nama_file, 'public');

    //     $barang->create([
    //         'id' => $request->id,
    //         'id_kategori' => $request->id_kategori,
    //         'nama_barang' => $request->nama_barang,
    //         'ukuran' => $request->ukuran,
    //         'warna' => $request->warna,
    //         'harga' => $request->harga,
    //         'foto' => 'http://localhost:8000'.Storage::url('ImageUpload/'.$nama_file),
    //     ]);
    //     if ($barang) {
    //         if (session('level') == "karyawan") {
    //             return redirect('/karyawan/barang');
    //         }
    //         if (session('level') == "admin") {
    //         return redirect('/admin/barang');
    //         }
    //     } else {
    //         return "gagal input data";
    //     }
    // }

    public function create(Request $request, Barang $barang)
    {
        $file = $request->file('foto');
        $tujuanUpload = 'ImageUpload/';
        $nama_file = $file->getClientOriginalName();
        $finalName = date('YmdHis') . "-" . $nama_file;
        $request->file('foto')->storeAs($tujuanUpload, $finalName, 'public');


        $barang->create([
            'id' => $request->id,
            'id_kategori' => $request->id_kategori,
            'id_warna' => $request->id_warna,
            'id_ukuran' => $request->id_ukuran,
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'stok' => 0,
            'harga' => $request->harga,
            'foto' => 'http://localhost:8000' . Storage::url('ImageUpload/' . $finalName),
        ]);
        if ($barang) {

            if (session('level') == "karyawan") {
                return redirect('/karyawan/brg');
            }
            if (session('level') == "admin") {
                return redirect('/admin/brg');
            }
        } else {
            return "gagal input data";
        }
    }

    public function add()
    {
        $kategori = Kategori::all();
        $warna = Warna::all();
        $ukuran = Ukuran::all();
        if (session('level') == "karyawan") {
            return view('karyawan.barang.form', compact('kategori', 'warna', 'ukuran'));
        }
        if (session('level') == "admin") {
            return view('karyawan.barang.form', compact('kategori', 'warna', 'ukuran'));
        }
    }


    public function edit(Barang $barang)
    {
        $brg = [
            'brg' => $barang,
            'kategori' => Kategori::all()
        ];
        if (session('level') == "karyawan") {
            return view('karyawan.barang.formEdit', $brg);
        }
        if (session('level') == "admin") {
            return view('karyawan.barang.formEdit', $brg);
        }
    }
    public function update(Request $request, Barang $barang)
    {
        $data = [
            'id' => $request->id,
            'id_kategori' => $request->id_kategori,
            'id_warna' => $request->id_warna,
            'id_ukuran' => $request->id_ukuran,
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
        ];

        if ($request->hasFile('foto')) {
            if (isset($barang->foto) && $barang->foto != "") {
                if (File::exists('storage/ImageUpload/' . $barang->foto)) {
                    unlink('storage/ImageUpload/' . $barang->foto);
                }
            }

            $file = $request->file('foto');
            $nama_file = $file->getClientOriginalName();
            $finalName = date('YmdHs') . "-" . $nama_file;

            $request->file('foto')->storeAs('ImageUpload/', $finalName, 'public');
            $data += ['foto' => 'http://localhost:8000' . Storage::url('ImageUpload/' . $finalName)];
        }

        $barang->update($data);

        if ($barang) {
            if (session('level') == "karyawan") {
                return redirect('/karyawan/dataBarang');
            }
            if (session('level') == "admin") {
                return redirect('/karyawan/dataBarang');
            }
        } else {
            return "gagal input data";
        }
    }


    public function destroy(Barang $barang)
    {
        $barang->delete();
        if ($barang) {
            if (session('level') == "karyawan") {
                return redirect('/karyawan/dataBarang');
            }
            if (session('level') == "admin") {
                return redirect('/admin/dataBarang');
            }
        } else {
            return 'error';
        }
    }

    public function laporan(Barang $barang)
    {
        $barangData = $barang->all();
        foreach ($barangData as $a) {
            // panggil procedure hitung stok
            $hitungStok = DB::select(DB::raw('CALL hitungStok(' . $a->id . ', @stok);'));
            // panggil hasil nilai kembalian dari procedure hitungstok
            $hasil = DB::select(DB::raw('SELECT @stok'));
            // ambil datanya dari @stok
            $a->stok = json_decode(json_encode($hasil[0]), true)['@stok'];
            $a->id_kategori = Kategori::find($a->id_kategori)->nama_kategori;
        }
        $brg = [
            'brg' => $barangData,
        ];
        return view('admin.app.laporan', $brg);
    }

    public function lapor(Barang $barang)
    {
        $barangData = $barang->all();
        foreach ($barangData as $a) {
            // panggil procedure hitung stok
            $hitungStok = DB::select(DB::raw('CALL hitungStok(' . $a->id . ', @stok);'));
            // panggil hasil nilai kembalian dari procedure hitungstok
            $hasil = DB::select(DB::raw('SELECT @stok'));
            // ambil datanya dari @stok
            $a->stok = json_decode(json_encode($hasil[0]), true)['@stok'];
            $a->id_kategori = Kategori::find($a->id_kategori)->nama_kategori;
        }
        $brg = [
            'brg' => $barangData,
        ];
        return view('karyawan.laporan', $brg);
    }


    public function exportpdf(Barang $barang)
    {
        $barangData = $barang->with('warna', 'kategori', 'ukuran', 'masuk', 'keluar')->get();
        $brg = [
            'brg' => $barangData,
        ];
        return view('karyawan.laporan.laporanData', $brg);
    }

    public function adminAdd(Barang $barang)
    {
        $kategori = Kategori::all();
        $warna = Warna::all();
        $ukuran = Ukuran::all();
        return view('admin.app.barang.form', compact('kategori', 'warna', 'ukuran'));
    }

    public function adminEdit(Barang $barang)
    {
        $brg = [
            'brg' => $barang,
            'kategori' => Kategori::all()
        ];
        return view('admin.app.barang.formEdit', $brg);
    }
    public function adminUpdate(Request $request, Barang $barang)
    {
        $data = [
            'id' => $request->id,
            'id_kategori' => $request->id_kategori,
            'id_warna' => $request->id_warna,
            'id_ukuran' => $request->id_ukuran,
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
        ];

        if ($request->hasFile('foto')) {
            if (isset($barang->foto) && $barang->foto != "") {
                if (File::exists('storage/ImageUpload/' . $barang->foto)) {
                    unlink('storage/ImageUpload/' . $barang->foto);
                }
            }

            $file = $request->file('foto');
            $nama_file = $file->getClientOriginalName();
            $finalName = date('YmdHs') . "-" . $nama_file;

            $request->file('foto')->storeAs('ImageUpload/', $finalName, 'public');
            $data += ['foto' => 'http://localhost:8000' . Storage::url('ImageUpload/' . $finalName)];
        }

        $barang->update($data);

        return redirect('/admin/barang');
    }


    public function adminDestroy(Barang $barang)
    {
        $barang->delete(); 
                return redirect('/admin/barangs');
    }

    public function cetakBarang(Barang $barang){
        $barangData = $barang->with('warna', 'kategori', 'ukuran')->get();
        
        $brg = [
            'brg' => $barangData,
        ];
        return view('admin.app.barang.cetakBarang', $brg);
    }

    public function cetakBarangPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir :".$tglakhir]);

      // $cetakPertanggal = Barang::with('user')->whereBetween('created_at', [$tglawal, $tglakhir])->get();

       $cetakPertanggal = Barang::with('warna', 'kategori', 'ukuran')->whereBetween('created_at', [$tglawal, $tglakhir])->get();

        return view('admin.app.barang.cetak-barang-pertgl', compact('cetakPertanggal'));

    }

    public function barang(Barang $barang)
    {
        $barangData = $barang->with('warna', 'kategori', 'ukuran')->get();
        $brg = [
            'brg' => $barangData,
        ];
        return view('admin.app.barang', $brg);
    }
}
