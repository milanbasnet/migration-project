<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProblemController;

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
    return view('home');
})->name('front');



Route::get('/family-visa', function () {
    return view('front.nav.visas.family');
})->name('family');

Route::get('/student-visa', function () {
    return view('front.nav.visas.student');
})->name('student');

Route::get('/business-visa', function () {
    return view('front.nav.visas.business');
})->name('business');

Route::get('/working-visa', function () {
    return view('front.nav.visas.working');
})->name('working');

Route::get('/travel-visa', function () {
    return view('front.nav.visas.travel');
})->name('travel');

Route::get('/dependent-visa', function () {
    return view('front.nav.visas.dependent');
})->name('dependent');


// Route::get('/about', function () {
//     return view('navs.about');
// })->name('moreabout');

Route::get('/news/page', function () {
    return view('front.nav.newsPage');
})->name('newsPage');

Route::get('/problems/page', function () {
    return view('front.nav.problemsPage');
})->name('problemPage');




Route::get('/admin', [AdminController::class, 'show'])->name('showAdmin');
Route::post('/message',[MessageController::class, 'messageStore'])->name('message');
Route::get('/show/message',[MessageController::class, 'messageShow'])->name('message.show');

//home
Route::get('/home', [AdminController::class, 'homeIndex'])->name('home');
Route::post('/add/home', [AdminController::class, 'storeHome'])->name('storeHome');
Route::get('/edit/home/{id}', [AdminController::class, 'editHome'])->name('homeEdit');
Route::post('/update/home/{id}', [AdminController::class, 'updateHome'])->name('homeUpdate');
Route::get('/delete/home/{id}', [AdminController::class, 'deleteHome'])->name('homeDelete');

//about us 
Route::get('/about', [AboutController::class, 'aboutIndex'])->name('about');
Route::post('/add/about', [AboutController::class, 'abouStore'])->name('storeAbout');
Route::get('/edit/about/{id}', [AboutController::class, 'editAbout'])->name('aboutEdit');
Route::post('/update/about/{id}', [AboutController::class, 'updateAbout'])->name('aboutUpdate');
Route::get('/delete/about/{id}', [AboutController::class, 'deleteAbout'])->name('aboutDelete');
//moreabout
Route::get('/about/more', [AboutController::class, 'moreAbout'])->name('moreabout');


//visas
Route::get('/visa', [VisaController::class, 'show'])->name('visa');
Route::post('/add/visa', [VisaController::class, 'visaStore'])->name('storeVisa');
Route::get('/edit/visa/{id}', [VisaController::class, 'editVisa'])->name('visaEdit');
Route::post('/update/visa/{id}', [VisaController::class, 'updateVisa'])->name('visaUpdate');
Route::get('/delete/visa/{id}', [VisaController::class, 'deleteVisa'])->name('visaDelete');

//news
Route::get('/news',[NewsController::class, 'show'])->name('news');
Route::post('/add/news',[NewsController::class, 'storeNews'])->name('storeNews');
Route::get('/edit/news/{id}',[NewsController::class, 'editNews'])->name('newsEdit');
Route::post('/update/news/{id}',[NewsController::class, 'updateNews'])->name('newsUpdate');
Route::get('/delete/news/{id}',[NewsController::class, 'deleteNews'])->name('newsDelete');
//news next page
// Route::get('/')

//problem
Route::get('/problems',[ProblemController::class, 'show'])->name('problem');
Route::post('/add/problems',[ProblemController::class, 'storeProblem'])->name('storeProblem');
Route::get('/edit/problems/{id}',[ProblemController::class, 'editProblem'])->name('problemEdit');
Route::post('/update/problems/{id}',[ProblemController::class, 'updateProblem'])->name('problemUpdate');
Route::get('/delete/problems/{id}',[ProblemController::class, 'deleteProblem'])->name('problemDelete');




