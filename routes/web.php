<?php

use App\Http\Controllers\RejectController;
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
    return view('welcome');
});

Route::get('/dashboard', [RejectController::class, 'dashboard']);

Route::get('/index', [RejectController::class, 'index'])->name('index');
//nambah data
Route::get('/tambahData', [RejectController::class, 'tambahData']);
Route::post('/insertData', [RejectController::class, 'insertData']);
//update data
Route::get('/tampilkanData/{id}', [RejectController::class, 'tampilkanData']);
Route::post('/updateData/{id}', [RejectController::class, 'updateData']);
//delete data
Route::get('/deleteData/{id}', [RejectController::class, 'deleteData']);

// Route::get('/tablet', function(){
//     return view('tablet.tablet');
// });

// Route::get('/home', []){
//     return view('home');
// });

Route::get('/login', function(){
    return view('login');
});
