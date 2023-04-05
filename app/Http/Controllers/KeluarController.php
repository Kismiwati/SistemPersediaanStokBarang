<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keluar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeluarController extends Controller
{
    public function index(Keluar $keluar)
    {
        // $dataKlr = $keluar->with('barang','user')->get();
        // // $dataKlr = $keluar->all();
        // // foreach($dataKlr as $a){
        // //     $a->id_user = User::find($a->id_user)->name;
        // // }
        // $datakeluar = [
        //     'datakeluar' => $dataKlr,
        // ];
        // return view('karyawan.keluar.index', $datakeluar);

        $dataKlr = $keluar->with('barang','user')->get();
        $datakeluar = [
            'datakeluar' => $dataKlr,
        ];
        
        return view('karyawan.keluar.index', $datakeluar);
    }

    public function add()
    {
        $barang = Barang::all();
        $user = User::all();
        return view('karyawan.keluar.form', compact('barang','user'));
    }

    public function create(Request $request, Keluar $keluar)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'id_barang ' => 'required',
            'id_user ' => 'required',
            'jml_brg_keluar' => 'required'
        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $barang = Barang::find($request->id_barang);
        // dd($barang);
        $jumlah = 0;
        if($barang->stok > $request->jml_brg_keluar){
            $jumlah  = $barang->stok - $request->jml_brg_keluar;
        }else{
            return redirect('/karyawan/keluar')->withErrors('Kelebihan Bos');

        }

        $keluar->create([
            'id' => $request->id,
            'id_barang' => $request->id_barang,
            'id_user' => session('id'),
            'jml_brg_keluar' => $request->jml_brg_keluar,
            ]);
        if ($keluar) {
            Barang::find($request->id_barang)->update(['stok' => $jumlah]);
            return redirect('/karyawan/keluar');
        } else {
            return "gagal input data";
        }
    }

    public function edit(Keluar $keluar)
    {
        $datakeluar = [
            'datakeluar' => $keluar,
        ];

        return view('karyawan.keluar.formEdit', $datakeluar);
    }

    public function update(Request $request, Keluar $keluar)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'id_barang ' => 'required',
            'id_user ' => 'required',
            'jml_brg_keluar' => 'required'
        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $total = $keluar->total;

        $keluar->update([
            'id' => $request->id,
            'id_barang' => $request->id_barang,
            'id_user' => $request->id_user,
            'jml_brg_keluar' => $request->jml_brg_keluar,
            //'total' => $total + $request->jml_brg_masuk,
        ]);
        if ($keluar) {
            return redirect('/karyawan/keluar');
        } else {
            return "gagal input data";
        }
    }

    public function destroy(Keluar $keluar)
    {
        $keluar->delete();
        if ($keluar) {
            return redirect('/karyawan/keluar');
        } 
        else{
            return 'error';
        }
    }

    public function exportpdf(Keluar $keluar)
    {
        $dataKlr = $keluar->with('barang','user')->get();
        $datakeluar = [
            'datakeluar' => $dataKlr,
        ];
        // return view('karyawan.laporan.cetakKeluar', $datakeluar);

        $barang = Barang::all();
        $user = User::all();
        return view('karyawan.laporan.cetakKeluar', $datakeluar, compact('barang','user'));
    }

    public function keluar(Keluar $keluar)
    {
        $dataKlr = $keluar->with('barang', 'user')->get();
        // $dataKlr = $keluar->all();
        // foreach($dataKlr as $a){
        //     $a->id_user = User::find($a->id_user)->name;
        // }
        $datakeluar = [
            'datakeluar' => $dataKlr,
        ];
        return view('admin.app.keluar', $datakeluar);
    }

    public function adminAdd()
    {
        $barang = Barang::all();
        $user = User::all();
        return view('admin.app.keluar.form', compact('barang','user'));
    }

    public function adminCreate(Request $request, Keluar $keluar)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'id_barang ' => 'required',
            'id_user ' => 'required',
            'jml_brg_keluar' => 'required'
        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $barang = Barang::find($request->id_barang);
        // dd($barang);
        $jumlah = 0;
        if($barang->stok >= $request->jml_brg_keluar){
            $jumlah  = $barang->stok - $request->jml_brg_keluar;
        }else{
            return redirect('/admin/keluar')->withErrors('Jumlah Barang yang ditambahahkan berlebihan');

        }

        $keluar->create([
            'id' => $request->id,
            'id_barang' => $request->id_barang,
            'id_user' => session('id'),
            'jml_brg_keluar' => $request->jml_brg_keluar,
            ]);
        if ($keluar) {
            Barang::find($request->id_barang)->update(['stok' => $jumlah]);
            return redirect('/admin/keluar');
        } else {
            return "gagal input data";
        }
    }

    public function adminEdit(Keluar $keluar)
    {
        $datakeluar = [
            'datakeluar' => $keluar,
        ];

        return view('admin.app.keluar.formEdit', $datakeluar);
    }

    public function adminUpdate(Request $request, Keluar $keluar)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'id_barang ' => 'required',
            'id_user ' => 'required',
            'jml_brg_keluar' => 'required'
        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $total = $keluar->total;

        $keluar->update([
            'id' => $request->id,
            'id_barang' => $request->id_barang,
            'id_user' => $request->id_user,
            'jml_brg_keluar' => $request->jml_brg_keluar,
            //'total' => $total + $request->jml_brg_masuk,
        ]);
        if ($keluar) {
            return redirect('/admin/keluar');
        } else {
            return "gagal input data";
        }
    }

    public function adminDestroy(Keluar $keluar)
    {
        $keluar->delete();
        if ($keluar) {
            return redirect('/admin/keluar');
        } 
        else{
            return 'error';
        }
    }

    public function cetakKeluar(Keluar $keluar) { 
        $dataKlr = $keluar->with('barang','user')->get();
        
        $dataklr = [
            'datakeluar' => $dataKlr,
        ];
        return view('admin.app.keluar.cetakKeluar', $dataklr);
    }

    public function cetakKeluarPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir :".$tglakhir]);

      // $cetakPertanggal = Barang::with('user')->whereBetween('created_at', [$tglawal, $tglakhir])->get();

       $cetakPertanggal = Keluar::with('barang','user')->whereBetween('created_at', [$tglawal, $tglakhir])->get();
       $jumlah =0;
       foreach( $cetakPertanggal as $c){
        $jumlah += $c->barang->harga*$c->jml_brg_keluar;
       }

        return view('admin.app.keluar.cetak-keluar-pertgl', compact('cetakPertanggal','jumlah'));

    }
}

