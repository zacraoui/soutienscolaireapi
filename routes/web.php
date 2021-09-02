<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Etudiants\EtudiantController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Etudiants\FormationController;
use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\Etudiants\DisponibiliteController;
use App\Http\Controllers\Etudiants\PaiementController;
use App\Http\Controllers\Teacher\TopicsController;
use App\Http\Controllers\Teacher\TestsController;
use App\Http\Controllers\Teacher\QuestionsController;
use App\Http\Controllers\Teacher\QuestionsOptionsController;
use App\Http\Controllers\Teacher\ResultsController;
use App\Http\Controllers\Teacher\homeController;

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

Auth::routes();
//****** ***** ***** nabil ****** ***** *****
Route::get('/',[SiteController::class,'index'])->name('site.home');
Route::get('/districts',[SiteController::class,'districts'])->name('districts.index');
Route::get('/prof/account-teacher',[SiteController::class,'accountTeacher'])->name('site.accountTeacher');
Route::post('/prof/account-teacher',[SiteController::class,'storeAccountTeacher'])->name('site.storeAccountTeacher');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('prof')->middleware(['auth'])->group(function () {

    //02-les informations personnels
    Route::get('/info-personnel', [SiteController::class,'infosPersonnel'])->name('info_personnel.prof');
    Route::post('/info-personnel', [SiteController::class,'storeInfosPersonnel'])->name('store_info_personnel.prof');

    Route::get('/info-professionnelle', [SiteController::class,'infosProfessionnelle'])->name('info_professionnelle.prof');
    Route::post('/info-professionnelle', [SiteController::class,'storeInfosProfessionnelle'])->name('store_info_professionnelle.prof');

    Route::get('/matiere', [SiteController::class,'matiere'])->name('matiere.prof');
    Route::post('/matiere', [SiteController::class,'storeMatiere'])->name('store_matiere.prof');

    Route::get('/complete', [SiteController::class,'complete'])->name('complete');
    Route::post('/complete', [SiteController::class,'storeComplete'])->name('store_complete');

});
//Admin
Route::prefix('dashboard')->name('admin.')->middleware(['auth','can:dashboard-admin'])->group(function () {
    Route::resource('/teachers',TeacherController::class);
    Route::get('/download/cv/{user}', [TeacherController::class,'cvDownload'])->name('cv.download');
    Route::get('/download/lettre-motivation/{user}', [TeacherController::class,'lettreDownload'])->name('lettre.download');
    Route::get('/get-users',[TeacherController::class,'getUsers'])->name('get.users');
    Route::get('/valid-teacher/{user}',[TeacherController::class,'validTeacher'])->name('valid.teacher');


});

//Teacher

Route::prefix('dashboard')->name('teacher.')->middleware(['auth','can:dashboard-teacher'])->group(function () {
    Route::resource('/profils',ProfileController::class);
    Route::get('/view-cv',[ProfileController::class,'viewCv'])->name('view.cv');
    Route::get('/view-lm',[ProfileController::class,'viewLm'])->name('view.lm');
    Route::get('/districts-by',[SiteController::class,'districtsBy'])->name('districtsBy.index');
    Route::get('/get-users',[ProfileController::class,'getUsers'])->name('getUsers');
    Route::get('/topics',[TopicsController::class,'index'])->name('index');
    Route::get('/tests',[TestsController::class,'index'])->name('index');
    Route::get('/result',[ResultsController::class,'index'])->name('index');
    Route::get('/question',[QuestionsController::class,'index'])->name('index');
    Route::get('/questionoption',[QuestionsOptionsController::class,'index'])->name('index');
    Route::get('/home',[homeController::class,'index'])->name('index');

});
Route::get('/topics',[TopicsController::class,'index'])->name('index');
    Route::get('/tests',[TestsController::class,'index'])->name('index');
    Route::get('/result',[ResultsController::class,'index'])->name('index');
    Route::get('/question',[QuestionsController::class,'index'])->name('index');
    Route::get('/questionoption',[QuestionsOptionsController::class,'index'])->name('index');
    Route::get('/home',[homeController::class,'index'])->name('index');

Route::get('/redirectTo',[SiteController::class,'redirectTo'])->name('redirectTo');


//****** ***** ***** zineb ****** ***** *****
Route::prefix('etudiant')->group(function () {
    //01-la creation de compte
    Route::get('/create', function () {
        return view('etudiants.not_payed.compte');
    })->name('create.etudiant');

    //02-les informations personnels
    Route::get('/info-personnel', function () {
        return view('etudiants.not_payed.info_personnel');
    })->name('info_personnel.etudiant');
    Route::post('/suite/inscription',[EtudiantController::class,'Suite_inscription'])->name('etudiants.suite.inscription');

    //03-formation
    Route::get('/formation', function () {
        return view('etudiants.not_payed.formation');
    })->name('info_personnel.formation');
    Route::get('/enregister-formation',[FormationController::class,'enregister_formation'])->name('nbheure');

    //04-disponibilité
    Route::get('/disponibilite', function () {
        return view('etudiants.not_payed.disponibilite');
    })->name('etudiant.disponibilite');
    Route::post('/enregister-disponibilite',[DisponibiliteController::class,'enregister_disponibilite'])->name('etudiants.disponibilite');

    //05-paiement
    Route::get('/paiement', function () {
        return view('etudiants.not_payed.paiement');
    })->name('etudiant.paiement');

    Route::get('/paiement-cmi', function () {
        return view('etudiants.not_payed.paiement.cmi');
    })->name('etudiant.paiement.cmi');
    Route::post('/Ok_Fail',[PaiementController::class,'Ok_Fail'])->name('Ok_Fail')->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    //
    Route::get('/paiement-recu', function () {
        return view('etudiants.not_payed.paiement.recu');
    })->name('etudiant.paiement.recu');
    Route::post('/paiement-recu',[PaiementController::class,'paiement_par_recu'])->name('etudiant.paiement.recu.eng');
});

//
Route::get('/niveau-etude',[FormationController::class,'niveau_etude'])->name('niveau.etude');
Route::get('/ajouterMatiere',[FormationController::class,'ajouterMatiere'])->name('ajouter.matiere');
Route::get('/nb-heure',[FormationController::class,'nb_heure'])->name('nbheure');

Route::get('/test',[\App\Http\Controllers\HomeController::class,'index'])->name('test');

//Route::get('/test', function () {
//    dd(uniqid());
//})->name('etudiant.disponibilite');
