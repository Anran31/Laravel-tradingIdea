<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\PostIdeaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/ideas/{idea}', [HomeController::class,'show'])->name('idea.show');
Route::delete('/ideas/{idea}', [HomeController::class,'destroy'])->name('idea.destroy');

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);

Route::post('/logout', [LogoutController::class,'store'])->name('logout');

Route::get('/post-idea', [PostIdeaController::class,'index'])->name('post-idea');
Route::post('/post-idea', [PostIdeaController::class,'store']);

Route::get('/storage/{filename}', function ($filename) 
{
   $path = storage_path($filename);

   if (!File::exists($path)) {
      abort(404);
   }

   $file = File::get($path);
   $type = File::mimeType($path);

   $response = Response::make($file, 200);
   $response->header("Content-Type", $type);

   return $response;
});