<?php

use App\Http\Controllers\DemandeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
   

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        
        Route::resource("etudiants",UserController::class);
        Route::get("user_delete/{id}",[UserController::class,"destroy"])->name("etudiants.delete");


        Route::resource("demandes",DemandeController::class);
        Route::get("demande_refuser/{id}",[DemandeController::class,"refuser"])->name("demandes.refuser");
        Route::get("demande_accepter/{id}",[DemandeController::class,"accepter"])->name("demandes.accepter");
        Route::get("demande_delete/{id}",[DemandeController::class,"destroy"])->name("demandes.delete");


    });

    Route::prefix('etudiant')->name('etudiant.')->group(function () {
            Route::resource("demandes",DemandeController::class);
            Route::get("demande_download/{id}",[DemandeController::class,"download"])->name("demande.download");





            Route::resource("documents",DocumentController::class);
            Route::get("document_dowload/{id}",[DocumentController::class,"dowload"])->name("documents.dowload");
            Route::get("document_delete/{id}",[DocumentController::class,"destroy"])->name("documents.delete");

    });


});

require __DIR__.'/auth.php';