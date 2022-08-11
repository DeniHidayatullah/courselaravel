<?php

use App\Http\Controllers\OuterController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

//route awal
// Route::get('/', function () {
//     return view('welcome',[
//         'title' => 'Homepage Welcome Kita',
//         'description' => 'Ini Deskripsi saya'
//     ]);
// });

//route kalau tidak digrup
Route::get('/', [OuterController::class , 'index']);

Route::controller(OuterController::class)->group(function () {
  Route::get('/', 'index')->name('home');
  Route::get('/article/{id}','article_detail')->name('article_detail');
});

//kalau di grup untuk url
Route::controller(UsersController::class)->group(function(){
  Route::get(
    '/login', 'login_form'
  )->name('login_form');
  Route::post('/login', 'login_action')->name('login_action');

  Route::get('/dashboard', 'dashboard_index')->name('dashboard_index');
  Route::post('/logout', 'dashboard_logout')->name('dashboard_logout');
  // Route::get(
  //   '/register', 'index'
  // );
});