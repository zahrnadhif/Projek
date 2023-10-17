<?php

use App\Http\Controllers\GejalaController;
use App\Http\Controllers\RejectController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Models\Gejala;
use App\Models\Reject;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboardUser');
});

Route::get('/dashboard', [RejectController::class,  'dashboard'])->middleware('auth');

//REJECT
Route::get('/index', [RejectController::class, 'index'])->name('index')->middleware('auth');
Route::get('/partial/modal/reject/{reject}', [RejectController::class, 'modalEditReject'])->middleware('auth');
Route::post('/edit/reject/{reject}', [RejectController::class, 'UpdateReject']);
Route::delete('/reject/{kode}', [RejectController::class, 'destroyReject']);

//nambah data
Route::get('/tambahData', [RejectController::class, 'tambahData']);
Route::post('/insertData', [RejectController::class, 'insertData']);
//update data
Route::get('/tampilkanData/{id}', [RejectController::class, 'tampilkanData']);
Route::post('/updateData/{id}', [RejectController::class, 'updateData']);
//delete data
Route::get('/deleteData/{id}', [RejectController::class, 'deleteData']);

Route::get('/aturan', [RejectController::class, 'aturan'])->name('relasiReject')->middleware('auth');
Route::get('/partial/modal/relasi/{reject}', [RejectController::class, 'modalEditRelasi'])->name('relasi')->middleware('auth');
Route::POST('/update/relasi/{reject}', [RejectController::class, 'updateRelasi']);

// halaman konsultasi user
Route::post('/buat/form', [RejectController::class, 'buatKonsultasi']);
Route::get('/konsultasi/{id}', [RejectController::class, 'konsultasi1'])->name('konsultasi1');
Route::get('/formKonsultasi', [RejectController::class, 'formKonsultasi']);
Route::get('/detail', [RejectController::class, 'detail']);
Route::post('/submitKonsultasi/{id}/{urutan}', [RejectController::class, 'submitKonsultasi1']);
Route::get('/hasil/{id}/{reject}', [RejectController::class, 'hasilKonsultasi'])->name('hasilKonsultasi');
Route::get('/home', [RejectController::class, 'home']);

//RiwayatUSER
Route::get('/riwayat', [RejectController::class, 'riwayatUser']);
//Data  Relasi User 
Route::get('/dataRelasi', [RejectController::class, 'dataRelasi']);
Route::get('/modal/detail/riwayat/{id}', [RejectController::class, 'modalDetailRiwayat'])->name('modaldetailRiwayat');


// Gejala
Route::get('/gejala', [GejalaController::class, 'gejala'])->name('gejala')->middleware('auth');
Route::get('/tampil/gejala/{id}', [GejalaController::class, 'tampilGejala'])->middleware('auth');
Route::post('/updateGejala/{id}', [GejalaController::class, 'updateGejala']);
//nambah data
Route::get('/tambahGejala', [GejalaController::class, 'tambahGejala']);
Route::post('/insertGejala', [GejalaController::class, 'insertGejala']);
Route::delete('/gejala/{gejala}', [GejalaController::class, 'destroyGejala'])->middleware('auth');
Route::get('/data/konsultasi', [RejectController::class, 'dataKonsultasi'])->name('perbaikan');
Route::delete('/riwayat/konsultasi/hapus/{kode}', [RejectController::class, 'destroyKonsultasi']);
Route::get('/data/perbaikan', [RejectController::class, 'dataPerbaikan']);
Route::get('/modal/detail/perbaikan/{id}', [RejectController::class, 'modalPerbaikan'])->middleware('auth');
Route::post('/isi/perbaikan/{id}', [RejectController::class, 'isiPerbaikan']);
// Route::get('/tablet', function(){
//     return view('tablet.tablet');
// });

// Route::get('/home', []){
//     return view('home');
// });

Route::get('/login', function () {
    return view('login');
})->name('login');

//Api
Route::get('/dtkyrw/{nrp}', [ApiController::class, 'dtkyrw']);
Route::get('/api/riwayat/', [ApiController::class, 'dataRiwayat'])->name('dataRiwayat');
Route::get('/grafik', [ApiController::class, 'grafikRiwayat']);

//Auth
//Login 
Route::post('/login/masuk', [AuthController::class, 'LoginEngineering']);
Route::get('/logout', [AuthController::class, 'logout']);
