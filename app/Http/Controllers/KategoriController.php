<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Kategori $kategori)
    {
        $dataKategori = $kategori->all();
        $jnbr = ['jnbr' => $dataKategori,];
        return view('karyawan.kategori.index', $jnbr);
    }

    public function create(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), 
        [
            'id' => 'required',
            'nama_kategori' => 'required'
        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $kategori->create([
            'id' => $request->id,
            'nama_kategori' => $request->nama_kategori,
        ]);
        if ($kategori) {
            return redirect('/karyawan/kategori');
        } else {
            return "gagal input data";
        }
    }

    public function add()
    {
        return view('karyawan.kategori.form');
    }

    public function edit(Kategori $kategori)
    {
        $jnbr = [
            'jnbr' => $kategori,
        ];

        return view('karyawan.kategori.formEdit', $jnbr);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama_kategori' => 'required'
        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $kategori->update([
            'id' => $request->id,
            'nama_kategori' => $request->nama_kategori,
        ]);

        if ($kategori) {
            return redirect('/karyawan/kategori');
        } else {
            return "gagal input data";
        }
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        if ($kategori) {
            return redirect('/karyawan/kategori');
        } 
        else{
            return 'error';
        }
    }

    public function jenis(Kategori $kategori)
    {
        $dataKategori = $kategori->all();
        $jnbr = ['jnbr' => $dataKategori,];
        return view('admin.app.kategori', $jnbr);
        
    }

    public function adminCreate(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), 
        [
            'id' => 'required',
            'nama_kategori' => 'required'
        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $kategori->create([
            'id' => $request->id,
            'nama_kategori' => $request->nama_kategori,
        ]);
        if ($kategori) {
            return redirect('/admin/kategori');
        } else {
            return "gagal input data";
        }
    }

    public function adminAdd()
    {
        return view('Admin.app.kategori.form');
    }

    public function adminEdit(Kategori $kategori)
    {
        $jnbr = [
            'jnbr' => $kategori,
        ];

        return view('Admin.app.kategori.formEdit', $jnbr);
    }

    public function adminUpdate(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama_kategori' => 'required'
        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $kategori->update([
            'id' => $request->id,
            'nama_kategori' => $request->nama_kategori,
        ]);

        if ($kategori) {
            return redirect('/admin/kategori');
        } else {
            return "gagal input data";
        }
    }

    public function adminDestroy(Kategori $kategori)
    {
        $kategori->delete();
        if ($kategori) {
            return redirect('/admin/kategori');
        } 
        else{
            return 'error';
        }
    }

}
