<?php

namespace App\Http\Controllers;

use App\Models\Ukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UkuranController extends Controller
{
    public function index(Ukuran $ukuran)
    {
        $dataUkuran = $ukuran->all();
        $dataukuran = [
            'dataukuran' => $dataUkuran,
        ];
        return view('karyawan.ukuran.index', $dataukuran);
    }

    public function add()
    {
        return view('karyawan.ukuran.form');
    }

    public function create(Request $request, Ukuran $ukuran)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama_ukuran' => 'required'
        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $ukuran->create([
            'id' => $request->id,
            'nama_ukuran' => $request->nama_ukuran,
        ]);
        if ($ukuran) {
            return redirect('/karyawan/ukuran');
        } else {
            return "gagal input data";
        }
    }

    public function edit(Ukuran $ukuran)
    {
        $dataukuran = [
            'dataukuran' => $ukuran,
        ];

        return view('karyawan.ukuran.formEdit', $dataukuran);
    }

    public function update(Request $request, Ukuran $ukuran)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama_ukuran ' => 'required'
        ]);

        if ($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $ukuran->update([
            'id' => $request->id,
            'nama_ukuran' => $request->ukuran,
        ]);
        if ($ukuran) {
            return redirect('/karyawan/ukuran');
        } else {
            return "gagal input data";
        }
    }

    public function destroy(Ukuran $ukuran)
    { {
            $ukuran->delete();
            if ($ukuran) {
                return redirect('/karyawan/ukuran');
            } else {
                return 'error';
            }
        }
    }

    public function admin(Ukuran $ukuran)
    {
        $dataUkuran = $ukuran->all();
        $dataukuran = [
            'dataukuran' => $dataUkuran,
        ];
        return view('admin.app.ukuran', $dataukuran);
    }
}
