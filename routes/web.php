<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UEController;
use App\Http\Controllers\ECController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UESController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/ues', [UESController::class, 'store'])->name('ues.store');

Route::get('/ues/create', [UESController::class, 'create'])->name('ues.create');

Route::resource('ues', UESController::class);
// Routes pour les UEs
Route::get('/ues', [UEController::class, 'index'])->name('ues.index');

// Routes pour les ECs
//Route::resource('ecs', ECController::class);

// Routes pour les étudiants
Route::resource('etudiants', EtudiantController::class);

// Routes pour les notes
Route::resource('notes', NoteController::class);

Route::post('/ues', [UESController::class, 'store'])->name('ues.store');

Route::get('/ues/{id}', [UEController::class, 'show'])->name('ues.show');

Route::get('/ues/{id}/edit', [UEController::class, 'edit'])->name('ues.edit');

Route::delete('/ues/{id}', [UEController::class, 'destroy'])->name('ues.destroy');

Route::put('/ues/{id}', [UeController::class, 'update'])->name('ues.update');

Route::delete('/ues/{id}', [UeController::class, 'destroy'])->name('ues.destroy');

//Route::resource('ecs', ECController::class);


// Route pour afficher la liste des ECs
Route::get('/ecs', [EcController::class, 'index'])->name('ecs.index');

// Route pour afficher le formulaire de création d'un EC
Route::get('/ecs/create', [EcController::class, 'create'])->name('ecs.create');

// Route pour enregistrer un nouveau EC
Route::post('/ecs', [EcController::class, 'store'])->name('ecs.store');

// Route pour afficher le formulaire d'édition d'un EC
Route::get('/ecs/{id}/edit', [EcController::class, 'edit'])->name('ecs.edit');

// Route pour mettre à jour un EC existant
Route::put('/ecs/{id}', [EcController::class, 'update'])->name('ecs.update');

// Route pour supprimer un EC
Route::delete('/ecs/{id}', [EcController::class, 'destroy'])->name('ecs.destroy');

// Page d'accueil
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Routes CRUD pour étudiants et notes
Route::resource('etudiants', EtudiantController::class);
Route::resource('notes', NoteController::class);

