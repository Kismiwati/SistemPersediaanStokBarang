<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (session('level') === "admin") {
                return redirect('/admin/barangs');
            } else if (session('level') === "karyawan") {
                return redirect('/karyawan/barangs');
            }
        }
        return view('login.login');
    }

    public function aksiLogin(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required|min:6",
        ]);

        //bentuk pengecualian input, jadi hanya email dan password yang boleh masuk
        $credentials = $request->only('email', 'password');

        //melakukan percobaan login
        $login = Auth::attempt($credentials);

        if ($login) {
            //ambil data pertama
            $selecUser = User::firstWhere('email', $request->email);

            $data = [
                "id" => $selecUser->id,
                "name" => $selecUser->name,
                "level" => $selecUser->level

            ];
            //masukkan data ke sision : id, name
            session($data);
            if (session('level') === "admin") {
                return redirect('/admin/barangs');
            } else if (session('level') === "karyawan") {
                return redirect('/karyawan/barangs');
            }
        } else {
            return redirect()->back()->withErrors('Email atau Password salah');
        }
    }

    public function register()
    {
        if (Auth::check()) {
            if (session('level') === "admin") {
                return redirect('/admin/barang');
            } else if (session('level') === "karyawan") {
                return redirect('/karyawan/barang');
            }
        }
        return view('login.register');
    }

    public function aksiRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'level' => 'required'
        ]);
        //pilihan 1
        //$data = $request->all();

        //pilihan 2
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "level" => $request->level
        ];

        //eksekusi query tambah data user
        $create = User::create($data);

        if ($create) {
            //pindah ke halaman login dan kasih 
            return redirect('/')->withSuccess('Akun anda telah terdaftar');
        } else {
            //jika tidak berhasil
            //kembali ke halaman sebelumnya, kirim eror ke setiap input
            return redirect()
                ->back()
                ->withInput();
        }
    }
    public function home()
    {
        //cek user sudah login atau belum
        $data = [
            "id" => session('id'),
            "name" => session('name')
        ];
        return view('admin.app.index', compact('data'));
    }

    public function destroy()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function user(User $user)
    {
        $dataUser = $user->all();
        $datauser = [
            'datauser' => $dataUser,
        ];
        return view('admin.app.user.index', $datauser);
    }
}
