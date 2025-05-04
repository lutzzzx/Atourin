<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('agendas.index');
    } else {
        return redirect()->route('login');
    }
});

Route::middleware(['auth'])->group(function () {
    Route::get('/agendas', [AgendaController::class, 'index'])->name('agendas.index');
    Route::get('/agendas/search', [AgendaController::class, 'search'])->name('agendas.search');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');

    Route::resource('agendas', AgendaController::class);
    Route::get('/user/agendas', [AgendaController::class, 'userAgendas'])->name('user.agendas');
    Route::delete('/agendas/{agenda}', [AgendaController::class, 'destroy'])->name('agendas.destroy');
    

    Route::post('/agendas/{agenda}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/{user}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::delete('/admin/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::patch('/admin/{user}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/agendas', [AdminController::class, 'agendas'])->name('admin.agendas');
    Route::delete('/admin/{agenda}/delete', [AdminController::class, 'agendaDestroy'])->name('admin.agendaDestroy');

    Route::post('/like/{agenda}', [LikeController::class, 'like'])->name('agendas.like');

    Route::post('/bookmark/{agenda}', [BookmarkController::class, 'bookmark'])->name('agendas.bookmark');
    Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('user.bookmarks');

    Route::prefix('agendas/{agenda}')->group(function () {
        Route::get('/details', [DetailController::class, 'index'])->name('details.index');
        Route::get('/userDetail', [DetailController::class, 'userDetail'])->name('details.userDetail');
        Route::get('/userDetail/create', [DetailController::class, 'create'])->name('details.create');
        Route::get('userDetail/createTransportasi', [DetailController::class, 'createTransportasi'])->name('details.createTransportasi');
        Route::get('userDetail/createDestinasi', [DetailController::class, 'createDestinasi'])->name('details.createDestinasi');
        Route::post('/userDetail', [DetailController::class, 'store'])->name('details.store');
        Route::get('/userDetail/{detail}', [DetailController::class, 'show'])->name('details.show');
        Route::get('/userDetail/{detail}/edit', [DetailController::class, 'edit'])->name('details.edit');
        Route::get('/userDetail/{detail}/editTransportasi', [DetailController::class, 'editTransportasi'])->name('details.editTransportasi');
        Route::get('/userDetail/{detail}/editDestinasi', [DetailController::class, 'editDestinasi'])->name('details.editDestinasi');
        Route::put('/userDetail/{detail}', [DetailController::class, 'update'])->name('details.update');
        Route::delete('/userDetail/{detail}', [DetailController::class, 'destroy'])->name('details.destroy');
    });
});

require __DIR__.'/auth.php';