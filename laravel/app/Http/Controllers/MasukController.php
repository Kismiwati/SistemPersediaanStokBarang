<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Masuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class MasukController extends Controller
{
    public function index(Masuk $masuk)
    {
        $dataMsk = $masuk->with('barang','user','kategori')->get();
        
        $datamsk = [
            'datamsk' => $dataMsk,
        ];
        return view('karyawan.masuk.index', $datamsk);
    }

    public function add()
    {
        
        $barang = Barang::all();
        $user = User::all();
        return view('karyawan.masuk.form', compact('barang','user'));

    }

    public function create(Request $request, Masuk $masuk)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'id_barang ' => 'required',
            'id_user ' => 'required',
            'jml_brg_masuk' => 'required',
            'total ' => 'required'

        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $stok = Barang::find($request->id_barang)->stok;

        $jumlah = $stok + $request->jml_brg_masuk;



        $masuk->create([
            'id' => $request->id,
            'id_barang' => $request->id_barang,
            'id_user' => session('id'),
            'jml_brg_masuk' => $request->jml_brg_masuk,
        ]);

        if ($masuk) {
            Barang::find($request->id_barang)->update(['stok' => $jumlah]);
            return redirect('/karyawan/masuk');
        } else {
            return "gagal input data";
        }
    }

    public function edit(Masuk $masuk)
    {
        $datamsk = [
            'datamsk' => $masuk,
        ];

        return view('karyawan.masuk.formEdit', $datamsk);
    }

    public function update(Request $request, Masuk $masuk)
    {
        $validator = Validator::make($request->all(), [
            'id_barang ' => 'required',
            'id_user ' => 'required',
            'jml_brg_masuk' => 'required',
            'total ' => 'required'

        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $total = $masuk->total;

        $masuk->update([
            'id_barang' => $request->id_barang,
            'id_user' => session('id'),
            'jml_brg_masuk' => $request->jml_brg_masuk,
            'total' => $total + $request->jml_brg_masuk,
        ]);
        if ($masuk) {
            return redirect('/karyawan/masuk');
        } else {
            return "gagal input data";
        }
    }

    public function destroy(Masuk $masuk)
    {
        $masuk->delete();
        if ($masuk) {
            return redirect('/karyawan/masuk');
        } 
        else{
            return 'error';
        }
    }

    public function masuk(Masuk $masuk)
    {
        $dataMsk = $masuk->with('barang', 'user', 'kategori')->get();
        $datamsk = [
            'datamsk' => $dataMsk,
        ];
        return view('admin.app.masuk', $datamsk);

    }

    public function adminAdd()
    {
        
        $barang = Barang::all();
        $user = User::all();
        return view('admin.app.masuk.form', compact('barang','user'));

    }

    public function adminCreate(Request $request, Masuk $masuk)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'id_barang ' => 'required',
            'id_user ' => 'required',
            'jml_brg_masuk' => 'required',
            'total ' => 'required'

        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $stok = Barang::find($request->id_barang)->stok;

        $jumlah = $stok + $request->jml_brg_masuk;



        $masuk->create([
            'id' => $request->id,
            'id_barang' => $request->id_barang,
            'id_user' => session('id'),
            'jml_brg_masuk' => $request->jml_brg_masuk,
        ]);

        if ($masuk) {
            Barang::find($request->id_barang)->update(['stok' => $jumlah]);
            return redirect('/admin/masuk');
        } else {
            return "gagal input data";
        }
    }

    public function adminEdit(Masuk $masuk)
    {
        $datamsk = [
            'datamsk' => $masuk,
        ];

        return view('admin.app.masuk.formEdit', $datamsk);
    }

    public function adminUpdate(Request $request, Masuk $masuk)
    {
        $validator = Validator::make($request->all(), [
            'id_barang ' => 'required',
            'id_user ' => 'required',
            'jml_brg_masuk' => 'required',
            'total ' => 'required'

        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $total = $masuk->total;

        $masuk->update([
            'id_barang' => $request->id_barang,
            'id_user' => session('id'),
            'jml_brg_masuk' => $request->jml_brg_masuk,
            'total' => $total + $request->jml_brg_masuk,
        ]);
        if ($masuk) {
            return redirect('/admin/masuk');
        } else {
            return "gagal input data";
        }
    }

    public function adminDestroy(Masuk $masuk)
    {
        $masuk->delete();
        if ($masuk) {
            return redirect('/admin/masuk');
        } 
        else{
            return 'error';
        }
    }

    public function exportpdf(Masuk $masuk)
    {
        $dataMsk = $masuk->with('barang','user','kategori')->get();
        
        $datamsk = [
            'datamsk' => $dataMsk,
        ];
        
        return view('karyawan.laporan.cetakMasuk', $datamsk);
    }

    public function cetakMasuk(Masuk $masuk){
        $dataMsk = $masuk->with('barang','user','kategori')->get();
        
        $datamsk = [
            'datamsk' => $dataMsk,
        ];
        return view('admin.app.masuk.cetakMasuk', $datamsk);
    }

    public function cetakMasukPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir :".$tglakhir]);

      // $cetakPertanggal = Barang::with('user')->whereBetween('created_at', [$tglawal, $tglakhir])->get();

       $cetakPertanggal = Masuk::with('barang','user','kategori')->whereBetween('created_at', [$tglawal, $tglakhir])->get();

       $jumlah =0;
       foreach( $cetakPertanggal as $c){
        $jumlah += $c->barang->harga*$c->jml_brg_masuk;
       }

       //dd($jumlah);
        return view('admin.app.masuk.cetak-masuk-pertgl', compact('cetakPertanggal','jumlah'));

    }



}
