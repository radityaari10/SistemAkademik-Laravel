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

Route::get('/', 'MahasiswasController@welcome');

Route::get('/home', function () {
    return redirect('/');
});



Route::get('data_mahasiswa', 'MahasiswasController@data_mahasiswa');

Route::get('lihat_data_mahasiswa', 'MahasiswasController@lihat_data_mahasiswa');

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('lihat_data_mahasiswa2', 'MahasiswasController@lihat_data_mahasiswa2');

Route::get('input_mahasiswa', 'MahasiswasController@input_mahasiswa');

Route::get('create', 'MahasiswasController@create');

// Tugas 21

Route::get('mahasiswa/cari', 'MahasiswasController@cari');

Route::resource('mahasiswa', 'MahasiswasController');

Route::get('email', 'MahasiswasController@email');

Route::get('cetak_pdf', 'MahasiswasController@cetak_pdf');

Route::get('export_excel', 'MahasiswasController@export_excel');


Route::resource('kelas', 'KelasController')->parameters(['kelas'=>'kelas']);

Route::resource('hobi', 'HobiController');

Route::resource('user', 'UserController');

// Route::get('mahasiswa/{mahasiswa}', 'MahasiswasController@show');

// Route::post('mahasiswa', 'MahasiswasController@store');

// Route::get('mahasiswa/{mahasiswa}/edit', 'MahasiswasController@edit');

// Route::patch('mahasiswa/{mahasiswa}', 'MahasiswasController@update');

// Route::delete('mahasiswa/{mahasiswa}', 'MahasiswasController@destroy');



Route::get('simpan_data', function () {
    DB::table('mahasiswa')->insert([
        [
            'nim'=>'1001',
            'nama'=>'Agus Yulianto',
            'tanggal_lahir'=>'2000-09-07',
            'jenis_kelamin'=>'L'
        ],
        [
            'nim'=>'1002',
            'nama'=>'Citra Kusumawati',
            'tanggal_lahir'=>'2000-01-07',
            'jenis_kelamin'=>'P'
        ],
        [
            'nim'=>'1003',
            'nama'=>'Firda Ajeng',
            'tanggal_lahir'=>'2000-11-09',
            'jenis_kelamin'=>'P'
        ],
    ]);
});

// Tugas 4 (disalin dulu baru dihapus)

Route::get('input', 'PagesController@input');

Route::post('tampilkan', 'PagesController@tampilkan');

// Jobsheet9

Route::get('coba_collection', 'MahasiswasController@cobaCollection');

Route::get('collection_first', 'MahasiswasController@collection_first');

Route::get('collection_last', 'MahasiswasController@collection_last');

Route::get('collection_count', 'MahasiswasController@collection_count');

Route::get('collection_take', 'MahasiswasController@collection_take');

Route::get('collection_pluck', 'MahasiswasController@collection_pluck');

Route::get('collection_where', 'MahasiswasController@collection_where');

Route::get('collection_wherein', 'MahasiswasController@collection_wherein');

Route::get('collection_toarray', 'MahasiswasController@collection_toarray');

Route::get('collection_tojson', 'MahasiswasController@collection_tojson');

// Jobsheet 10

Route::get('date_mutator', 'MahasiswasController@date_mutator');



