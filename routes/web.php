<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ownercontroller;

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
// Route::get("/", [Ownercontroller::class, "welcome"]);
//alows postman to check where it is. / is the homepage and welcome is where the method is to show all the owners.
