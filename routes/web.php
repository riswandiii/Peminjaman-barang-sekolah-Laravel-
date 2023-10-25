<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustumerController;
use App\Http\Controllers\DataPeminjamanController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Home;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\SaranaDanPrasaranaController;
use App\Models\PeminjamanDetail;
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

// Route untuk masuk di controller Home
Route::get('/', [Home::class, 'index'])->middleware('auth');

// Route untuk masuk di LoginController
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route mehod post untuk masuk di loginContrller
Route::post('/login', [LoginController::class, 'login']);

// Route method post untuk masuk di login controller untuk logout
Route::post('/logout', [LoginController::class, 'logout']);

// Route untuk masuk di RegistrasiCOntroller
Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
// Route method post untuk masuk di RegistrasiController
Route::post('/registrasi', [RegistrasiController::class, 'registrasi']);

// Route dan controller untuk dashbard admin
Route::get('/dashboard', function(){
    return view('dashboard.index', [
        'title' => 'Dashboard Admin'
    ]);  
})->middleware('admin');

// Route untuk masuk di ProfilController
Route::get('/profil/{user:id}', [ProfilController::class, 'index'])->middleware('auth');

// route untuk masuk di SaranaDanPrasaranaCOntroller
Route::get('/sarana dan prasarana', [SaranaDanPrasaranaController::class, 'index'])->middleware('auth');

// Method resource untuk masuk di BarangController
Route::resource('/sarana-prasarana', BarangController::class)->middleware('admin');

// Route untuk masuk di PeminjamanController
Route::get('/peminjaman/{barang:id}', [PeminjamanController::class, 'index'])->middleware('auth');

// Route untuk masuk di peminjamanController
Route::post('/peminjaman/{barang:id}', [PeminjamanController::class, 'peminjaman'])->middleware('auth');

// Route untuk masuk di HistoryCOntroller
Route::get('/history/{user:id}', [HistoryController::class, 'index'])->middleware('auth');

// Route untuk masuk di PeminjamanController pda function kembalikan
Route::get('/kembalikan/{id}', [PeminjamanController::class, 'kembalikan'])->middleware('auth');

// Route untuk masuk di PeminjamanController pada function detailPeminjaman
Route::get('/detail-peminjaman/{id}', [PeminjamanController::class, 'detailPeminjaman'])->middleware('auth');

// Route untuk masuk di SaranaDanPrasaranaController pada function category
Route::get('/category/{id}', [SaranaDanPrasaranaController::class, 'category'])->middleware('auth');

// Route untuk masuk di CustumerCOntroller
Route::get('/custumer', [CustumerController::class, 'index'])->middleware('admin');

// Route untuk masuk di CustumerController
Route::get('/custumer/{user:id}', [CustumerController::class, 'detail'])->middleware('admin');

// Route untuk mauk di DataPeminjamanController
Route::get('/data-peminjaman', [DataPeminjamanController::class, 'index'])->middleware('admin');

// Route untuk mauk di DataPeminjamanController
Route::get('/data-peminjaman/{id}', [DataPeminjamanController::class, 'detail'])->middleware('admin'); 

// Route untuk masuk di ContactController
Route::get('/contact', [ContactController::class, 'index'])->middleware('auth');