<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDPabrik;
use App\Http\Controllers\CRUDBankSampah;
use App\Http\Controllers\guest;
use App\Http\Controllers\test; #ini cuma testing 
use Illuminate\support\Facades\Auth;


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/oke', function (){ return view('InputSampah'); });
Route::get('/dashboard', [guest::class, "lihat"]);
Route::get('/guest', function (){ return view('guest'); });
Route::get('/mambo', [test::class, "lihat"]);


Route::get('/', function () {

    if(!auth()->check()){
        return redirect('/dashboard');
     }

    if(auth()->user()->role == 'user'){
        return redirect('/guest');
    }

    if(auth()->user()->role == 'petugas'){
        return redirect('/petugas');
    }

    if(auth()->user()->role == 'pabrik'){
        return redirect('/pabrik');
    }

})->name('main');

Route::middleware(['auth','role:petugas'])->group(function () {
    Route::get('/petugas', [CRUDBankSampah::class, "lihat"]);
    Route::get('/inputsampah', [CRUDBankSampah::class, "tambah"]);
    Route::post('/Banktambah/proses', [CRUDBankSampah::class, 'ptambah'])->name('post.tambahBank');
    Route::get('/edit-transaksibank/{Tanggal}/{IDBankSampah}', [CRUDBankSampah::class, 'edit'])->name('edit.transaksibank');
    Route::put('/update-transaksibank/{IDTransaksiSampah}', [CRUDBankSampah::class, 'update'])->name('update.transaksibank');
    Route::delete('/delete-transaksibank/{Tanggal}/{IDBankSampah}', [CRUDBankSampah::class, 'delete'])->name('delete.transaksibank');
});

Route::middleware(['auth','role:pabrik'])->group(function () {
    Route::get('/pabrik', [CRUDPabrik::class, "lihat"]);
    Route::get('/inputuang', [CRUDPabrik::class, "tambah"])->name('get.tambahPabrik');
    Route::post('/pabriktambah/proses', [CRUDPabrik::class, 'ptambah'])->name('post.tambahPabrik');
    Route::get('/edit-transaksipabrik/{Tanggal}/{IDBankSampah}', [CRUDPabrik::class, 'edit'])->name('edit.transaksipabrik');
    Route::put('/update-transaksipabrik', [CRUDPabrik::class, 'update'])->name('update.transaksipabrik');
    Route::delete('/delete-transaksipabrik/{Tanggal}/{IDBankSampah}', [CRUDPabrik::class, 'delete'])->name('delete.transaksipabrik');
});