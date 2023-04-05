<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\WarnaController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

//Route::get('/karyawan/barang', [BarangController::class, 'index']);

Route::get('/', [AuthController::class, 'index']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/aksiLogin', [AuthController::class, 'aksiLogin']);
Route::post('/aksiRegister', [AuthController::class, 'aksiRegister']);

Route::group(['middleware' => 'ceklogin'], function(){
  Route::group(['middleware' => 'level'], function(){ 
    Route::get('/admin/barangs', [BarangController::class, 'indexs']);
// Route::get('/admin/laporan', [BarangController::class, 'laporan']);
// Route::get('/admin/masuk', [MasukController::class, 'masuk']);
// Route::get('/admin/keluar', [KeluarController::class, 'keluar']);
// Route::get('/admin/jenis', [KategoriController::class, 'jenis']);
// Route::get('/admin/warna', [WarnaController::class, 'admin']);
// Route::get('/admin/ukuran', [UkuranController::class, 'admin']);

Route::get('/admin/user', [AuthController::class, 'user']);
Route::get('/admin/user/add', [AuthController::class, 'add']);
 Route::post('/admin/user/create', [AuthController::class, 'create']);
 Route::get('/admin/editUser/{keluar}', [AuthController::class, 'edit']);
 Route::post('/admin/updateUser/{keluar}', [AuthController::class, 'update']);
 Route::get('/admin/deleteUser/{keluar}', [AuthController::class, 'destroy']);



//   Route::get('/admin/barang', [BarangController::class, 'aindex']);
//  Route::get('/admin/barangs', [BarangController::class, 'indexs']);
//  Route::get('/admin/barang/add', [BarangController::class, 'aadd']);
//  Route::post('/admin/barang/createBarang', [BarangController::class, 'acreate']);
//  Route::get('/admin/editBarang/{barang}', [BarangController::class, 'aedit']);
//  Route::post('/admin/updateBarang/{barang}', [BarangController::class, 'aupdate']);
//  Route::get('/admin/deleteBarang/{barang}', [BarangController::class, 'adestroy']);

//  Route::get('/admin/kategori', [KategoriController::class, 'index']);
//  Route::post('/admin/kategori/create', [KategoriController::class, 'create']);
//  Route::get('/admin/kategori/add', [KategoriController::class, 'add']);
//  Route::get('/admin/edit/{kategori}', [KategoriController::class, 'edit']);
//  Route::post('/admin/update/{kategori}', [KategoriController::class, 'update']);
//  Route::get('/admin/delete/{kategori}', [KategoriController::class, 'destroy']);

//  Route::get('/admin/masuk', [MasukController::class, 'index']);
//  Route::get('/admin/masuk/add', [MasukController::class, 'add']);
//  Route::post('/admin/masuk/createBarang', [MasukController::class, 'create']);
//  Route::get('/admin/editBarangmasuk/{masuk}', [MasukController::class, 'edit']);
//  Route::post('/admin/updateBarangmasuk/{masuk}', [MasukController::class, 'update']);
//  Route::get('/admin/deleteBarangmasuk/{masuk}', [MasukController::class, 'destroy']);

//  Route::get('/admin/keluar', [KeluarController::class, 'index']);
//  Route::get('/admin/keluar/add', [KeluarController::class, 'add']);
//  Route::post('/admin/keluar/createBarang', [KeluarController::class, 'create']);
//  Route::get('/admin/editBarangkeluar/{keluar}', [KeluarController::class, 'edit']);
//  Route::post('/admin/updateBarangkeluar/{keluar}', [KeluarController::class, 'update']);
//  Route::get('/admin/deleteBarangkeluar/{keluar}', [KeluarController::class, 'destroy']);
  });

 Route::get('/karyawan/dataBarang', [BarangController::class, 'index']);
 Route::get('/karyawan/barangs', [BarangController::class, 'indexs']);
 Route::get('/karyawan/barang/add', [BarangController::class, 'add']);
 Route::post('/karyawan/barang/createBarang', [BarangController::class, 'create']);
 Route::get('/karyawan/editBarang/{barang}', [BarangController::class, 'edit']);
 Route::post('/karyawan/updateBarang/{barang}', [BarangController::class, 'update']);
 Route::get('/karyawan/deleteBarang/{barang}', [BarangController::class, 'destroy']);
 Route::get('/karyawan/laporan', [BarangController::class, 'lapor']);

 Route::get('/karyawan/kategori', [KategoriController::class, 'index']);
 Route::post('/karyawan/kategori/create', [KategoriController::class, 'create']);
 Route::get('/karyawan/kategori/add', [KategoriController::class, 'add']);
 Route::get('/karyawan/edit/{kategori}', [KategoriController::class, 'edit']);
 Route::post('/karyawan/update/{kategori}', [KategoriController::class, 'update']);
 Route::get('/karyawan/delete/{kategori}', [KategoriController::class, 'destroy']);

 Route::get('/karyawan/masuk', [MasukController::class, 'index']);
 Route::get('/karyawan/masuk/add', [MasukController::class, 'add']);
 Route::post('/karyawan/masuk/createBarang', [MasukController::class, 'create']);
 Route::get('/karyawan/editBarangmasuk/{masuk}', [MasukController::class, 'edit']);
 Route::post('/karyawan/updateBarangmasuk/{masuk}', [MasukController::class, 'update']);
 Route::get('/karyawan/deleteBarangmasuk/{masuk}', [MasukController::class, 'destroy']);
 //export PDF
 Route::get('/karyawan/exportpdfdata', [BarangController::class, 'exportpdf']);
 Route::get('/karyawan/exportpdfmasuk', [MasukController::class, 'exportpdf']);
 Route::get('/karyawan/exportpdfkeluar', [KeluarController::class, 'exportpdf']);
 Route::get('/karyawan/cetakMasuk', [MasukController::class, 'cetakForm']);
 Route::get('/karyawan/Pertanggal/{tglawal}/{tglakhir}', [MasukController::class, 'cetakPertanggal']);



 Route::get('/karyawan/keluar', [KeluarController::class, 'index']);
 Route::get('/karyawan/keluar/add', [KeluarController::class, 'add']);
 Route::post('/karyawan/keluar/createBarang', [KeluarController::class, 'create']);
 Route::get('/karyawan/editBarangkeluar/{keluar}', [KeluarController::class, 'edit']);
 Route::post('/karyawan/updateBarangkeluar/{keluar}', [KeluarController::class, 'update']);
 Route::get('/karyawan/deleteBarangkeluar/{keluar}', [KeluarController::class, 'destroy']);

 Route::get('/karyawan/warna', [WarnaController::class, 'index']);
 Route::get('/karyawan/warna/add', [WarnaController::class, 'add']);
 Route::post('/karyawan/warna/createwarna', [WarnaController::class, 'create']);
 Route::get('/karyawan/editBarangwarna/{warna}', [WarnaController::class, 'edit']);
 Route::post('/karyawan/updateBarangwarna/{warna}', [WarnaController::class, 'update']);
 Route::get('/karyawan/deleteBarangwarna/{warna}', [WarnaController::class, 'destroy']);

 Route::get('/karyawan/ukuran', [UkuranController::class, 'index']);
 Route::get('/karyawan/ukuran/add', [UkuranController::class, 'add']);
 Route::post('/karyawan/ukuran/createukuran', [UkuranController::class, 'create']);
 Route::get('/karyawan/editBarangukuran/{ukuran}', [UkuranController::class, 'edit']);
 Route::post('/karyawan/updateBarangukuran/{ukuran}', [UkuranController::class, 'update']);
 Route::get('/karyawan/deleteBarangukuran/{ukuran}', [UkuranController::class, 'destroy']);

Route::get('/home', [AuthController::class, 'home']);
Route::get('/logout', [AuthController::class, 'destroy']);
Route::get('karyawan/dashboard', [BarangController::class, 'indexs']);

});

Route::get('/admin/barang', [BarangController::class, 'indexs']);
Route::get('/admin/brg', [BarangController::class, 'barang']);
Route::get('/admin/barang/add', [BarangController::class, 'adminAdd']);
 Route::post('/admin/barang/createBarang', [BarangController::class, 'adminCreate']);
 Route::get('/admin/editBarang/{barang}', [BarangController::class, 'adminEdit']);
 Route::post('/admin/updateBarang/{barang}', [BarangController::class, 'adminUpdate']);
 Route::get('/admin/deleteBarang/{barang}', [BarangController::class, 'adminDestroy']);
 Route::get('/admin/cetakbarang', [BarangController::class, 'cetakBarang']);
 Route::get('/admin/barang/Pertanggal/{tglawal}/{tglakhir}', [BarangController::class, 'cetakBarangPertanggal']);

Route::get('/admin/laporan', [BarangController::class, 'laporan']);

Route::get('/admin/masuk', [MasukController::class, 'masuk']);
Route::get('/admin/masuk/add', [MasukController::class, 'adminAdd']);
 Route::post('/admin/masuk/createBarang', [MasukController::class, 'adminCreate']);
 Route::get('/admin/editBarangmasuk/{masuk}', [MasukController::class, 'adminEdit']);
 Route::post('/admin/updateBarangmasuk/{masuk}', [MasukController::class, 'adminUpdate']);
 Route::get('/admin/deleteBarangmasuk/{masuk}', [MasukController::class, 'adminDestroy']);
 Route::get('/admin/cetakMasuk', [MasukController::class, 'cetakMasuk']);
 Route::get('/admin/Pertanggal/{tglawal}/{tglakhir}', [MasukController::class, 'cetakMasukPertanggal']);


Route::get('/admin/keluar', [KeluarController::class, 'keluar']);
Route::get('/admin/keluar/add', [KeluarController::class, 'adminAdd']);
 Route::post('/admin/keluar/createBarang', [KeluarController::class, 'adminCreate']);
 Route::get('/admin/editBarangkeluar/{keluar}', [KeluarController::class, 'adminEdit']);
 Route::post('/admin/updateBarangkeluar/{keluar}', [KeluarController::class, 'adminUpdate']);
 Route::get('/admin/deleteBarangkeluar/{keluar}', [KeluarController::class, 'adminDestroy']);
 Route::get('/admin/cetakKeluar', [KeluarController::class, 'cetakKeluar']);
 Route::get('/admin/keluar/Pertanggal/{tglawal}/{tglakhir}', [KeluarController::class, 'cetakKeluarPertanggal']);

// route untuk admin kategori
Route::get('/admin/jenis', [KategoriController::class, 'jenis']);
Route::post('/admin/kategori/create', [KategoriController::class, 'adminCreate']);
 Route::get('/admin/kategori/add', [KategoriController::class, 'adminAdd']);
 Route::get('/admin/edit/{kategori}', [KategoriController::class, 'adminAdit']);
 Route::post('/admin/update/{kategori}', [KategoriController::class, 'adminUpdate']);
 Route::get('/admin/delete/{kategori}', [KategoriController::class, 'adminDestroy']);

Route::get('/admin/user', [AuthController::class, 'user']);
Route::get('/admin/user/add', [AuthController::class, 'add']);
 Route::post('/admin/user/create', [AuthController::class, 'create']);
 Route::get('/admin/editUser/{keluar}', [AuthController::class, 'edit']);
 Route::post('/admin/updateUser/{keluar}', [AuthController::class, 'update']);
 Route::get('/admin/deleteUser/{keluar}', [AuthController::class, 'destroy']);

 Route::get('/admin/warna', [WarnaController::class, 'admin']);
 Route::get('/admin/ukuran', [UkuranController::class, 'admin']);

 Route::get('/admin/catak-barang', [BarangController::class, 'cetakForm']);
 Route::get('/admin/catak-barang-tgl', [BarangController::class, 'cetakForm']);
 Route::get('/admin/catak-barang-pertgl/{tglawal}/{tglakhir}', [BarangController::class, 'cetaktgl']);
