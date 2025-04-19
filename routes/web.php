<?php

use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\IncidentesController;
use App\Http\Controllers\ObrasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//****Creando las rutas para la app*****/
//Incidentes
Route::get('get-all-incidentes-arreglo', [IncidentesController::class, 'getAllIncidentesArreglo'])
->middleware(['auth', 'verified'])
->name('get-all-incidentes-arreglo');

Route::get('get-all-incidentes', [IncidentesController::class, 'getAllIncidentes'])
->middleware(['auth', 'verified'])
->name('get-all-incidentes');

Route::resource('incidentes', IncidentesController::class)
->middleware(['auth', 'verified'])
->names('incidentes');

//Imagenes
Route::get('get-all-imagenes-arreglo', [ImagenesController::class, 'getAllImagenesArreglo'])
->middleware(['auth', 'verified'])
->name('get-all-imagenes-arreglo');

Route::get('get-all-imagenes', [ImagenesController::class, 'getAllImagenes'])
->middleware(['auth', 'verified'])
->name('get-all-imagenes');

Route::resource('imagenes', ImagenesController::class)
->middleware(['auth', 'verified'])
->names('imagenes');

//obras
Route::get('get-all-obras-arreglo', [ObrasController::class, 'getAllObrasArreglo'])
->middleware(['auth', 'verified'])
->name('get-all-obras-arreglo');

Route::get('get-all-obras', [ObrasController::class, 'getAllObras'])
->middleware(['auth', 'verified'])
->name('get-all-obras');

Route::resource('obras', ObrasController::class)
->middleware(['auth', 'verified'])
->names('obras');
