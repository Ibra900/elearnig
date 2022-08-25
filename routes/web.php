<?php

use App\Models\User;
use App\Models\Lecon;
use App\Models\Module;
use App\Models\Chapitre;
use App\Models\Formation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MailboxController;
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
Route::get('formations', [IndexController::class, 'formations'])->name('formations');
Route::get('formations/details-formation/{id}', [IndexController::class, 'afficheFormation'])->name('formations.show');
Route::get('formations/lecture-formation/{id}', [IndexController::class, 'lectureFormation'])->name('formations.lecture');

Route::get('about', function () { return view('about'); })->name('about');
Route::get('contact', function () { return view('contact'); })->name('contact');

Route::get('profil', [IndexController::class, 'profil'])->name('profil');

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
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('mailbox', 'MailboxController');
});

Route::get('admin/compose', [MailboxController::class, 'compose'])->name('admin.mailbox.compose');

Route::get('admin/send', [MailboxController::class, 'send'])->name('admin.mailbox.send');

Route::get('admin/reply_mail/{id}', [MailboxController::class, 'replyMail'])->name('admin.mailbox.replyMail');

Route::get('admin/trash', [MailboxController::class, 'trash'])->name('admin.mailbox.trash');

Route::get('admin/trash/show/{id}', [MailboxController::class, 'showTrash'])->name('admin.mailbox.showTrash');

Route::delete('admin/trash/delete/{id}', [MailboxController::class, 'force_delete'])->name('admin.mailbox.force_delete');

Route::get('/admin/dashboard', function () {
        $nbreU = User::all()->count();
        $nbreF = Formation::all()->count();
        $nbreM = Module::all()->count();
        $nbreC = Chapitre::all()->count();
        $nbreL = Lecon::all()->count();
    return view ('admin.dashboard', compact('nbreU', 'nbreF', 'nbreM', 'nbreC', 'nbreL'));
});
