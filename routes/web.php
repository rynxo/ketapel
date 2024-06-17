<?php

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

Route::middleware('guest')->group(function () {

    Route::get('/', 'PageController@kelogin')->name('login');

    Route::get('/register', 'PageController@keregister');

    Route::post('/login', 'AuthController@login');

    Route::post('/registrasi', "AuthController@registrasi");
});

Route::get('/beranda', "ViewController@beranda")->name('beranda');

Route::get('/cariLayanan', "ViewController@cariLayanan");

Route::middleware('auth')->group(function () {
    Route::get('/logout', 'AuthController@logout');

    Route::get('/home', 'PageController@home');

    Route::get('/layanan', 'PageController@layanan');

    Route::get('/main', 'PageController@main');

    Route::get('/tapel', 'PageController@tapel');

    Route::get('/talay', 'PageController@talay');

    Route::get('/profil', 'PageController@profil');

    Route::get('/ubahpassword', 'PageController@ubahpw');
    // menyimpan data dari form movies ke database 
    Route::post('/save', 'PageController@tambahpelanggan');
    // Melakukan Edit Data dari form edit movies
    Route::put('/updatePelanggan/{id}', 'PageController@updatepelanggan');
    // Aksi untuk menghapus data sesuai id
    Route::get('/deletePelanggan/{id}', 'PageController@deletePelanggan');

    // Menangkap data dari form edit layanan
    Route::put('/updateLayanan/{id}', "PageController@updateLayanan");
    // Mengimpan data dari form tambah layanan ke database
    Route::post('/saveLayanan', "PageController@tambahlayanan");
    // Aksi untuk menghapus Layanan sesuai id
    Route::get('/deleteLayanan/{id}', 'PageController@deleteLayanan');

    Route::post('/repass', 'AuthController@repass');
});
