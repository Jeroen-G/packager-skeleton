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

Route::get(
  '/packages/:lc:vendor/:lc:package/sample',
  '\\:uc:vendor\\:uc:package\\Http\\Controllers\\SamplesController@sample'
)->name('packages.:lc:vendor.:lc:package.sample');
