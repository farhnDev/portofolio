<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\skillController;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\interfaceController;
use App\Http\Controllers\pengaturanHalamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.index');
// });
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [interfaceController::class, "index"]);

//ini kita buat route, karena ketika blum login maka sistem akan mengarahkan ke home, nah
//supaya ke login maka kita buat kan redirectnya ok 

Route::redirect('home', 'dashboard');


//index auth
Route::get('/auth', [authController::class, "index"])->name('login')
    ->middleware('guest');  //-> name login ini adalah untuk deklarasikan bahwa itu login
// ini auth
Route::get('/auth/redirect', [authController::class, "redirect"])
    ->middleware('guest');
//auth callback 
Route::get('/auth/callback', [authController::class, "callback"])
    ->middleware('guest');
// arti dari guest adalah yang dapat melakukan login hanya yang belum login 

//logout
Route::get('/auth/logout', [authController::class, "logout"]);

//hal dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');   //jadi middleware ini membuktikan bahwa user harus login, dan ini udh di siapkan sama laravel



//halaman
//kita buat prefix supaya tidak membuat route yang sama padahal satu directory
Route::prefix('dashboard')->middleware('auth')->group(  //dan kita berikan auth bahwa dia sudah login atau belum
    function () {
        Route::get('/', [halamanController::class, "index"]);
        Route::resource('halaman', halamanController::class);
        //dalam laravel sudah menyediakan function untuk route nya ia adalah resource

        //riwayat
        Route::resource('experience', experienceController::class);

        //education
        Route::resource('education', educationController::class);

        //skill
        Route::get('skill', [skillController::class, "index"])->name('skill.index');
        Route::post('skill', [skillController::class, "update"])->name('skill.update');

        //profile
        Route::get('profile', [profileController::class, "index"])->name('profile.index');
        Route::post('profile', [profileController::class, "update"])->name('profile.update');

        //pengaturanhalaman
        Route::get('pengaturanHalaman', [pengaturanHalamanController::class, "index"])->name('pengaturanHalaman.index');
        Route::post('pengaturanHalaman', [pengaturanHalamanController::class, "update"])->name('pengaturanHalaman.update');
    }
);
