<?php

namespace App\Http\Controllers;

use App\Models\Warna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WarnaController extends Controller
{
    public function index(Warna $warna)
    {
        $dataWarna = $warna->all();
        $datawarna = [
            'datawarna' => $dataWarna,
        ];
        return view('karyawan.warna.index', $datawarna);
    }

    public function add()
    {
        return view('karyawan.warna.form');
    }

    public function create(Request $request, Warna $warna)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'warna' => 'required'
        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $warna->create([
            'id' => $request->id,
            'warna' => $request->warna,
        ]);
        if ($warna) {
            return redirect('/karyawan/warna');
        } else {
            return "gagal input data";
        }
    }

    public function edit(Warna $warna)
    {
        $datawarna = [
            'datawarna' => $warna,
        ];

        return view('karyawan.warna.formEdit', $datawarna);
    }

    public function update(Request $request, Warna $warna)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'warna ' => 'required'
        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $warna->update([
            'id' => $request->id,
            'warna' => $request->warna,
        ]);
        if ($warna) {
            return redirect('/karyawan/warna');
        } else {
            return "gagal input data";
        }
    }

    public function destroy(Warna $warna)
    { {
            $warna->delete();
            if ($warna) {
                return redirect('/karyawan/warna');
            } else {
                return 'error';
            }
        }
    }

    public function admin(Warna $warna)
    {
        $dataWarna = $warna->all();
        $datawarna = [
            'datawarna' => $dataWarna,
        ];
        return view('admin.app.warna', $datawarna);
    }
}
