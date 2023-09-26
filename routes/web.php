<?php

use App\Http\Controllers\GejalaController;
use App\Http\Controllers\RejectController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
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

Route::get('/dashboard', [RejectController::class, 'dashboard']);
Route::get('/home', [RejectController::class, 'home']);


Route::get('/index', [RejectController::class, 'index'])->name('index');
//nambah data
Route::get('/tambahData', [RejectController::class, 'tambahData']);
Route::post('/insertData', [RejectController::class, 'insertData']);
//update data
Route::get('/tampilkanData/{id}', [RejectController::class, 'tampilkanData']);
Route::post('/updateData/{id}', [RejectController::class, 'updateData']);
//delete data
Route::get('/deleteData/{id}', [RejectController::class, 'deleteData']);

Route::get('/aturan', [RejectController::class, 'aturan']);
Route::get('/partial/modal/relasi/{reject}', [RejectController::class, 'modalEditRelasi'])->name('relasi');
Route::POST('/update/relasi/{reject}', [RejectController::class, 'updateRelasi']);

// halaman konsultasi user
Route::get('/konsultasi/{id}', [RejectController::class, 'konsultasi1']);
Route::get('/formKonsultasi', [RejectController::class, 'formKonsultasi']);
Route::get('/detail', [RejectController::class, 'detail']);
Route::post('/submitKonsultasi/{id}/{urutan}', [RejectController::class, 'submitKonsultasi1']);


// Gejala
Route::get('/gejala', [GejalaController::class, 'gejala'])->name('gejala');
//nambah data
Route::get('/tambahGejala', [GejalaController::class, 'tambahGejala']);
Route::post('/insertGejala', [GejalaController::class, 'insertGejala']);

// Route::get('/tablet', function(){
//     return view('tablet.tablet');
// });

// Route::get('/home', []){
//     return view('home');
// });

Route::get('/login', function () {
    return view('login');
});

//Api
Route::get('/dtkyrw/{nrp}', [ApiController::class, 'dtkyrw']);

//Auth
//Login User
Route::post('/login/user', [AuthController::class, 'LoginUser']);
