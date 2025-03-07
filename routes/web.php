<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\backend\PendidikanController;
use App\Http\Controllers\backend\PengalamanKerjaController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SessionController;

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

// Acara 3
Route::get('/', function () {
    return view('welcome');
});

Route::get('foo', function () {
    return 'hello';
});

// Route::get('user', [UserController::class, 'index']);

Route::match(['get', 'post'], '/match', function () {
    return 'simatch';
});
Route::any('/any', function () {
    return 'siany';
});

Route::permanentRedirect('/here', '/there');

Route::view('/welcome', 'welcome', ['name' => 'Aurel']);

// Route::get('user/{name?}', function ($name = 'Lia') {
//     return $name;
// })->where('name', '[A-Za-z]+');

// Route::get('user/{id}', function ($id) {
//     return $id;
// })->where('id', '[0-9]+');

// Route::get('user/{id}/{name}', function ($id, $name) {
//     return "$id - $name";
// })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

// Route::get('search/{search}', function ($search) {
//     return $search;
// })->where('search', '.*');


// Acara 4
//route bernama 'profile'
// Route::get('user/{id}/profile', function ($id) {
//     return route('profile', ['id' => $id]);
// })->name('profile');

//generate url ke route bersama
Route::get('/generate-url', function () {
    $url = route('profile', ['id' => 5]);
    return "URL ke profile: $url";
});

//redirect ke route bersama
Route::get('/redirect-profile', function () {
    return redirect()->route('profile', ['id' => 5]);
});

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {});
    Route::get('user/profile', function () {});
});

Route::namespace('Admin')->group(function () {
    Route::get('users', function () {});
});

Route::domain('account.myapp.com')->group(function () {
    Route::get('user/{id}', function ($id) {});
});

Route::prefix('admin')->group(function () {
    Route::get('users', function () {});
});

Route::name('admin.')->group(function () {
    Route::get('users', function () {})->name('users');
});

// Acara 5
Route::get('user', [ManagementUserController::class, 'index']);
Route::get('user/create', [ManagementUserController::class, 'create']);
Route::post('user', [ManagementUserController::class, 'store']);
Route::get('user/{id}', [ManagementUserController::class, 'show']);
Route::get('user/{id}/edit', [ManagementUserController::class, 'edit']);
Route::put('user/{id}', [ManagementUserController::class, 'update']);
Route::delete('user/{id}', [ManagementUserController::class, 'destroy']);

Route::get('/home', [ManagementUserController::class, 'index']);

Route::get("/home", function() {
    return view('home');
});

//Acara 7
Route::resource('/home7', HomeController::class);
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Acara 8
Route::resource('dashboard', DashboardController::class);
Route::resource('product', ProductController::class);

//Acara 13
Route::group(['namespace' => 'App\Http\Controllers\backend'], function () {
    Route::resource('dash', DashboardController::class);
    Route::resource('pengalaman_kerja', PengalamanKerjaController::class);
    Route::resource('pendidikan', PendidikanController::class);
});

//Acara 17
Route::get('/session/create', [SessionController::class, 'create']);
Route::get('/session/show', [SessionController::class, 'show']);
Route::get('/session/delete', [SessionController::class, 'delete']);

Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);

Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);

//coba error
Route::get('/cobaerror/{nama?}', [CobaController::class, 'index']);