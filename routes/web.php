<?php

use Laratrust\Laratrust;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    if (Auth::check()) {
        if (auth()->user()->hasRole('lecturer')) {
            return redirect('/class');
        } else {
            return redirect('/profile');
        }
    } else {
        return view('welcome');
    }
});

// profile
Route::get('/profile', \App\Http\Livewire\Profile::class)->name('profile')->middleware('auth');

Route::get('/attendances', \App\Http\Livewire\Braches::class)->name('branches')->middleware('role:admin');
Route::get('/headbranch', \App\Http\Livewire\Manager::class)->name('head.branch')->middleware('role:admin');
Route::get('/securities', \App\Http\Livewire\Manager::class)->name('securities')->middleware('auth');

