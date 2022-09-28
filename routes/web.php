<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StrukController;

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

Route::resource('/struk', StrukController::class);

// Route::res('/', function () {
//     return view('struk');
// });
