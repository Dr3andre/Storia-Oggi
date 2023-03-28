<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

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



           // Public controller
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/articolo/dettaglio/{id}', [PublicController::class, 'articleDetail'])->name('article.detail');
Route::get('/lavora-con-noi', [PublicController::class, 'workWithUs'])->name('work.with.us');
Route::post('/lavora-con-noi/invio', [PublicController::class, 'workWithUsSubmit'])->name('work.with.us.submit');
Route::get('/articolo-ricerca', [PublicController::class,'searchArticle'])->name('search');
            // Fine Public controller






            // Article controller
Route::get('/crea-articolo', [ArticleController::class, 'create'])->name('article.create');
Route::post('/crea-articolo/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/articoli/{user}', [ArticleController::class, 'userArticles'])->name('user.articles');
Route::get('/articoli/categoria/{category}', [ArticleController::class, 'categoryArticles'])->name('category.articles');







            // Revisor controller
Route::delete('/dashboard-revisor/article-detail/delete/{article}', [RevisorController::class,'deleteArticle'])->name('revisor.delete');
Route::get('/dashboard-revisor', [RevisorController::class, 'dashboard'])->name('dashboard.revisor');
Route::get('/dashboard-revisor/scelta/{article}/{choice}', [RevisorController::class, 'choiceRequest'])->name('revisor.choice');
Route::get('/dashboard-revisor/article-detail{article}',[RevisorController::class,'articleDetail'])->name('revisor.article.detail');
            //Fine Revisor controller










            // Admin controller
Route::get('/dashboard-admin', [AdminController::class, 'dashboard'])->name('dashboard.admin');
Route::get('/dashboard-admin/scelta/{user}/{choice}', [AdminController::class, 'acceptRequest'])->name('admin.choice');
Route::put('/dashboard-admin/tags/modifica/{tag}', [AdminController::class,'update'])->name('admin.tags.update');
Route::delete('/dashboard-admin/tags/elimina/{tag}', [AdminController::class,'destroy'])->name('admin.tags.delete');
Route::put('/dashboard-admin/categoria/modifica/{category}', [AdminController::class,'updateCategory'])->name('admin.category.update');
Route::delete('/dashboard-admin/categoria/elimina/{category}', [AdminController::class,'destroyCategory'])->name('admin.category.delete');
            //Fine Admin controller

            


















