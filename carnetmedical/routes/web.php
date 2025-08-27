<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\TraitementController;
use App\Http\Controllers\Carnet_MedicalController;
use App\Http\Controllers\ProfilController;

/*use App\Http\Controllers\PatientController;*/

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
    return view('welcome');})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/medecins',[MedecinController::class,'index'])->name('medecins.index');
Route::post('/medecins',[MedecinController::class,'store'])->name('medecins.store');

Route::get('/patients',[PatientController::class,'index'])->name('patients.index');
Route::post('/patients',[PatientController::class,'store'])->name('patients.store');

Route::get('/rendezvous',[RendezvousController::class,'index'])->name('rendezvous.index');
Route::post('/rendezvous',[RendezvousController::class,'store'])->name('rendezvous.store');

Route::get('/consultations',[ConsultationController::class,'index'])->name('consultations.index');
Route::post('/consultations',[ConsultationController::class,'store'])->name('consultations.store');

Route::get('/traitements',[TraitementsController::class,'index'])->name('traitements.index');
Route::post('/traitements',[TraitementsController::class,'store'])->name('traitements.store');

Route::get('/carnets',[CarnetsController::class,'index'])->name('carnets.index');
Route::post('/carnets',[CarnetsController::class,'store'])->name('carnets.store');

Route::get('/profil',[ProfilController::class,'index'])->name('profil.index');
Route::post('/profil/edit',[ProfilController::class,'edit'])->name('profil.edit');
Route::put('/profil/{profil}',[ProfilController::class,'update'])->name('profil.update');

Route::get('/medecins/create',[MedecinController::class,'create'])->name('medecins.create');
Route::get('/medecins/{medecin}/edit',[MedecinController::class,'edit'])->name('medecins.edit');
Route::put('/medecins/{medecin}',[MedecinController::class,'update'])->name('medecins.update');
Route::delete('/medecins/{medecin}',[MedecinController::class,'destroy'])->name('medecins.destroy');
Route::get('/medecins/{medecin}',[MedecinController::class,'show'])->name('medecins.show');

Route::get('/patients/create',[PatientController::class,'create'])->name('patients.create');
Route::get('/patients/{patient}/edit',[PatientController::class,'edit'])->name('patients.edit');
Route::put('/patients/{patient}',[PatientController::class,'update'])->name('patients.update');
Route::delete('/patients/{patient}',[PatientController::class,'destroy'])->name('patients.destroy');
Route::get('/patients/{patient}',[PatientController::class,'show'])->name('patients.show');

/*Route::get('/rendezvous/create', [RendezvouSController::class, 'create'])->name('rendezvous.create');
Route::get('/rendezvous/{id}', [RendezvouSController::class, 'show'])->name('rendezvous.show');
Route::get('/rendezvous/{id}/edit', [RendezvouSController::class, 'edit'])->name('rendezvous.edit');
Route::put('/rendezvous/{id}', [RendezvouSController::class, 'update'])->name('rendezvous.update');
Route::delete('/rendezvous/{id}', [RendezvouSController::class, 'destroy'])->name('rendezvous.destroy');*/

Route::get('/consultations/create',[ConsultationController::class,'create'])->name('consultations.create');
Route::get('/consultations/{consultation}/edit',[ConsultationController::class,'edit'])->name('consultations.edit');
Route::put('/consultations/{consultation}',[ConsultationController::class,'update'])->name('consultations.update');
Route::delete('/consultations/{consultation}',[ConsultationController::class,'destroy'])->name('consultations.destroy');
Route::get('/consultations/{consultation}',[ConsultationController::class,'show'])->name('consultations.show');

Route::get('/carnets/create',[CarnetsController::class,'create'])->name('carnets.create');
Route::get('/carnets/{carnet}/edit',[CarnetsController::class,'edit'])->name('carnets.edit');
Route::put('/carnets/{carnet}',[CarnetsController::class,'update'])->name('carnets.update');
Route::delete('/carnets/{carnet}',[CarnetsController::class,'destroy'])->name('carnets.destroy');
Route::get('/carnets/{carnet}',[CarnetsController::class,'show'])->name('carnets.show');

require __DIR__.'/auth.php';

