<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DataSiteController;
use App\Http\Controllers\ImageSiteController;
use App\Http\Controllers\ProblemSiteController;
use App\Http\Controllers\SiarTroubleTicketController;
use App\Http\Controllers\SiartroubleticketDetailController;
use App\Http\Controllers\TopoTroubleTicketController;
use App\Http\Controllers\TopotroubleticketDetailController;
use App\Http\Controllers\TroubleTicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

// Route::middleware(['auth:sanctum', 'verified'])->get('/main', function () {
//     return view('layouts.main');
// })->name('main');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('scenes.dashboard');
    })->name('dashboard');

    Route::resource('datasites', DataSiteController::class);
    Route::get('/get-site-details/{id}', [TopoTroubleTicketController::class, 'getSiteDetails']);

    // Route::get('/get-site-details/{id}', [DataSiteController::class, 'getDetails']);
    Route::prefix('datasites/{datasite}')->group(function () {
        Route::resource('images', ImageSiteController::class);
        Route::resource('problems', ProblemSiteController::class);
    });

    Route::resource('troubleticket', TroubleTicketController::class);

    Route::resource('topotroubleticket', TopoTroubleTicketController::class);

    Route::prefix('topotroubleticket/{ticket_id}')->group(function () {
        Route::get('details/create', [TopotroubleticketDetailController::class, 'create'])->name('topotroubleticket.details.create');
        Route::post('details', [TopotroubleticketDetailController::class, 'store'])->name('topotroubleticket.details.store');
        Route::get('details/{id}/edit', [TopotroubleticketDetailController::class, 'edit'])->name('topotroubleticket.details.edit');
        Route::put('details/{id}', [TopotroubleticketDetailController::class, 'update'])->name('topotroubleticket.details.update');
        Route::delete('details/{id}', [TopotroubleticketDetailController::class, 'destroy'])->name('topotroubleticket.details.destroy');
    });

    Route::resource('siartroubleticket', SiarTroubleTicketController::class);

    Route::prefix('siartroubleticket/{ticket_id}')->group(function () {
        Route::get('details/create', [SiartroubleticketDetailController::class, 'create'])->name('siartroubleticket.details.create');
        Route::post('details', [SiartroubleticketDetailController::class, 'store'])->name('siartroubleticket.details.store');
        Route::get('details/{id}/edit', [SiartroubleticketDetailController::class, 'edit'])->name('siartroubleticket.details.edit');
        Route::put('details/{id}', [SiartroubleticketDetailController::class, 'update'])->name('siartroubleticket.details.update');
        Route::delete('details/{id}', [SiartroubleticketDetailController::class, 'destroy'])->name('siartroubleticket.details.destroy');
    });

    Route::get('data', [DataController::class, 'index'])->name('data.index');
    Route::post('data/upload', [DataController::class, 'upload'])->name('data.upload');
});

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->group(function () {
    Route::resource('users', AdminController::class)->except([
        'show' // Menghapus rute `show` jika tidak diperlukan
    ]);
});

Route::middleware(['auth:sanctum', 'verified', 'role:user'])->group(function () {
    Route::get('/my-tasks', [UserController::class, 'index'])->name('my.tasks');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
