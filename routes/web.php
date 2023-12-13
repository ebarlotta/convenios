<?php

use App\Http\Livewire\Carreras\CarreraComponent;
use App\Http\Livewire\Estudiantes\EstudianesComponent;
use App\Http\Livewire\Individuales\IndividualesComponent;
use App\Http\Livewire\Marcos\MarcosComponent;
use App\Http\Livewire\Proyectos\ProyectosComponent;
use App\Http\Livewire\Receptoras\ReceptorasComponent;
use App\Http\Livewire\Responsables\ResponsablesComponent;
use App\Http\Livewire\Roles\RolesComponent;
use App\Models\Marcos;
//use CarrerasComponent;
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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('carreras', CarreraComponent::class)->name('carreras');
Route::get('marcos', MarcosComponent::class)->name('marcos');
Route::get('roles', RolesComponent::class)->name('roles');
Route::get('responsables', ResponsablesComponent::class)->name('responsables');
Route::get('estudiantes', EstudianesComponent::class)->name('estudiantes');
Route::get('individuales', IndividualesComponent::class)->name('individuales');
Route::get('receptoras', ReceptorasComponent::class)->name('receptoras');
Route::get('proyectos', ProyectosComponent::class)->name('proyectos');
