<?php

use Laratrust\Laratrust;
use App\Http\Livewire\Staff;
use App\Http\Livewire\Staffs;
use App\Http\Livewire\Payment;
use App\Http\Livewire\Profile;
use App\Http\Livewire\StaffShow;
use App\Http\Livewire\Securities;
use App\Http\Livewire\SecurityShow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;

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
        if (auth()->user()->hasRole('admin')) {
            return redirect('/branches');
        } else {
            return redirect('/profile');
        }
    } else {
        return view('welcome');
    }
});

// profile
Route::get('/profile', \App\Http\Livewire\Profile::class)->name('profile')->middleware('auth');

Route::get('/branches', \App\Http\Livewire\Braches::class)->name('branches')->middleware('role:admin');
Route::get('/headbranch', \App\Http\Livewire\Manager::class)->name('head.branch')->middleware('role:admin');
Route::get('/securities', \App\Http\Livewire\Manager::class)->name('securities')->middleware('auth');

// staff details
Route::get('/branch/{branch:state}/staffs', Staff::class)->name('staffs.index')->middleware('auth');
Route::get('/branch/{branch:state}/staffs/{staff:name}', StaffShow::class)->name('staffs.show')->middleware('auth');

// securities details
Route::get('/branch/{branch:state}/securities', Securities::class)->name('securities.index')->middleware('auth');
Route::get('/branch/{branch:state}/security/{security:name}', SecurityShow::class)->name('securities.show')->middleware('auth');

// payments
Route::get('/branch/{branch:state}/payments/', Payment::class)->name('payments.index')->middleware('auth');

// admin own
// staff details
Route::get('/staffs', Staffs::class)->middleware('role:admin');
Route::get('/staff/{staff:name}', StaffShow::class)->middleware('role:admin');

// securities details
Route::get('/branch/{branch:state}/securities', Securities::class)->name('securities.index')->middleware('auth');
Route::get('/branch/{branch:state}/security/{security:name}', SecurityShow::class)->name('securities.show')->middleware('auth');

// payments
Route::get('/branch/{branch:state}/payments/', Payment::class)->name('payments.index')->middleware('auth');
