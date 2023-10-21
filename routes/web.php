<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Header1Controller;
use App\Http\Controllers\Admin\Header2Controller;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\Home\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//Home
Route::get('/', [IndexController::class, 'index'])->name('home');
//Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Auth::routes();
//admin
Route::name('admin.')->prefix('/admin-panel/management/')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //header1
    Route::get('setting/header1', [Header1Controller::class, 'index'])->name('header1.index');
    Route::get('setting/header1/create', [Header1Controller::class, 'create'])->name('header1.create');
    Route::post('setting/header1/store', [Header1Controller::class, 'store'])->name('header1.store');
    Route::get('setting/header1/edit/{item}', [Header1Controller::class, 'edit'])->name('header1.edit');
    Route::put('setting/header1/update/{item}', [Header1Controller::class, 'update'])->name('header1.update');
    Route::post('setting/header1/remove', [Header1Controller::class, 'remove'])->name('header1.remove');
    //header2
    Route::get('setting/header2', [Header2Controller::class, 'index'])->name('header2.index');
    Route::get('setting/header2/create', [Header2Controller::class, 'create'])->name('header2.create');
    Route::post('setting/header2/store', [Header2Controller::class, 'store'])->name('header2.store');
    Route::get('setting/header2/edit/{item}', [Header2Controller::class, 'edit'])->name('header2.edit');
    Route::put('setting/header2/update/{item}', [Header2Controller::class, 'update'])->name('header2.update');
    Route::post('setting/header2/remove', [Header2Controller::class, 'remove'])->name('header2.remove');
    //Config
    Route::get('setting/index', [SettingController::class, 'index'])->name('setting.index');
    Route::put('setting/update', [SettingController::class, 'update'])->name('setting.update');


    Route::resource('form',\App\Http\Controllers\FormController::class);
});
Route::get('/logout',function (){
   \auth()->logout();
   return redirect()->route('home');
});

Route::get('/verification/verify',function (){

})->name('verification.verify');

//Route::get('/auth-basic',function (){
//   return 'Auth Basic';
//})->middleware('auth.basic');
