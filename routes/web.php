<?php

use App\Models\User;
use App\Models\Formation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;


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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('about', function () { return view('about'); })->name('about');
Route::get('courses', function () { return view('courses'); })->name('courses');
Route::get('elements', function () { return view('elements'); })->name('elements');
Route::get('course-details', function () { return view('course-details'); })->name('course-details');
Route::get('blog-home', function () { return view('blog-home'); })->name('blog-home');
Route::get('blog-single', function () { return view('blog-single'); })->name('blog-single');
Route::get('contact', function () { return view('contact'); })->name('contact');

Route::get('formations', [FormationController::class, 'index'])->name('formations');
Route::get('formations/details-formations/{id}', [FormationController::class, 'show'])->name('formations.show');
Route::get('formations/module/{id}', [ModuleController::class, 'show'])->name('module');


Auth::routes();

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('users', 'UserController');
});
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('formations', 'FormationController');
});
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('modules', 'ModuleController');
});
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('chapitres', 'ChapitreController');
});
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('lecons', 'LeconController');
});


Route::get('/admin/dashboard', function () {
        $nbreUsers = User::all()->count();
        $nbreFormations = Formation::all()->count();
    return view ('admin.dashboard', compact('nbreUsers', 'nbreFormations'));
});
