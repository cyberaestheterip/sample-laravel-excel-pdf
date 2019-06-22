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

use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/excel', function () {
    return Excel::download(new UserExport(), 'user.xlsx');
});

Route::get('/pdf', function () {
    return Excel::download(new UserExport(), 'user.pdf');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
