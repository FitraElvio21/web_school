<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimoniController;
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
// frontend
Route::get('', [HomeController::class, 'index']);
// Detail
Route::get('/detail-berita/{idBerita}', [HomeController::class, 'detailBerita']);
Route::get('/detail-jurusan', [HomeController::class, 'detailJurusan']);
Route::get('/detail-organisasi', [HomeController::class, 'detailOrganisasi']);

// auth
Route::get('/admin/login', [AuthController::class, 'index']);
Route::get('/admin/logout', [AuthController::class, 'logout']);
Route::post('/admin/login-action', [AuthController::class, 'login']);

Route::group(['middleware' => 'cek-auth'], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    // About
    Route::get('/admin/about', [AboutController::class, 'index']);
    Route::get('/admin/about/create-form', [AboutController::class, 'createForm']);
    Route::post('/admin/about/create', [AboutController::class, 'create']);
    Route::get('/admin/about/edit-form/{idAbout}', [AboutController::class, 'editForm']);
    Route::put('/admin/about/update/{idAbout}', [AboutController::class, 'update']);
    Route::delete('/admin/about/delete/{idAbout}', [AboutController::class, 'delete']);
    Route::get('/admin/about/detail-about/{idAbout}', [AboutController::class, 'detail']);
    // Profile
    Route::get('/admin/profile', [ProfileController::class, 'index']);
    Route::get('/admin/profile/create-form', [ProfileController::class, 'createForm']);
    Route::post('/admin/profile/create', [ProfileController::class, 'create']);
    Route::get('/admin/profile/edit-form/{idProfile}', [ProfileController::class, 'editForm']);
    Route::put('/admin/profile/update/{idProfile}', [ProfileController::class, 'update']);
    Route::delete('/admin/profile/delete/{idProfile}', [ProfileController::class, 'delete']);
    Route::get('/admin/profile/detail-profile/{idProfile}', [ProfileController::class, 'detail']);
    // Berita
    Route::get('/admin/berita', [BeritaController::class, 'index']);
    Route::get('/admin/berita/create-form', [BeritaController::class, 'createForm']);
    Route::post('/admin/berita/create', [BeritaController::class, 'create']);
    Route::get('/admin/berita/edit-form/{idBerita}', [BeritaController::class, 'editForm']);
    Route::put('/admin/berita/update/{idBerita}', [BeritaController::class, 'update']);
    Route::delete('/admin/berita/delete/{idBerita}', [BeritaController::class, 'delete']);
    Route::get('/admin/berita/detail-berita/{idBerita}', [BeritaController::class, 'detail']);
    // Service
    Route::get('/admin/service', [ServiceController::class, 'index']);
    Route::get('/admin/service/create-form', [ServiceController::class, 'createForm']);
    Route::post('/admin/service/create', [ServiceController::class, 'create']);
    Route::get('/admin/service/edit-form/{idService}', [ServiceController::class, 'editForm']);
    Route::put('/admin/service/update/{idService}', [ServiceController::class, 'update']);
    Route::delete('/admin/service/delete/{idService}', [ServiceController::class, 'delete']);
    //portfolio
    Route::get('/admin/portfolio', [PortfolioController::class, 'index']);
    Route::get('/admin/portfolio/create-form', [PortfolioController::class, 'createForm']);
    Route::post('/admin/portfolio/create', [PortfolioController::class, 'create']);
    Route::get('/admin/portfolio/edit-form/{idPortfolio}', [PortfolioController::class, 'editForm']);
    Route::put('/admin/portfolio/update/{idPortfolio}', [PortfolioController::class, 'update']);
    Route::delete('/admin/portfolio/delete/{idPortfolio}', [PortfolioController::class, 'delete']);
    // Testimoni
    Route::get('/admin/testimoni', [TestimoniController::class, 'index']);
    Route::get('/admin/testimoni/create-form', [TestimoniController::class, 'createForm']);
    Route::post('/admin/testimoni/create', [TestimoniController::class, 'create']);
    Route::get('/admin/testimoni/edit-form/{idTestimoni}', [TestimoniController::class, 'editForm']);
    Route::put('/admin/testimoni/update/{idTestimoni}', [TestimoniController::class, 'update']);
    Route::delete('/admin/testimoni/delete/{idTestimoni}', [TestimoniController::class, 'delete']);
    // Logo
    Route::get('/admin/logo', [LogoController::class, 'index']);
    Route::get('/admin/logo/create-form', [LogoController::class, 'createForm']);
    Route::post('/admin/logo/create', [LogoController::class, 'create']);
    Route::get('/admin/logo/edit-form/{idLogo}', [LogoController::class, 'editForm']);
    Route::put('/admin/logo/update/{idLogo}', [LogoController::class, 'update']);
    Route::delete('/admin/logo/delete/{idLogo}', [LogoController::class, 'delete']);
    // Prestasi
    Route::get('/admin/prestasi', [PrestasiController::class, 'index']);
    Route::get('/admin/prestasi/create-form', [PrestasiController::class, 'createForm']);
    Route::post('/admin/prestasi/create', [PrestasiController::class, 'create']);
    Route::get('/admin/prestasi/edit-form/{idPrestasi}', [PrestasiController::class, 'editForm']);
    Route::put('/admin/prestasi/update/{idPrestasi}', [PrestasiController::class, 'update']);
    Route::delete('/admin/prestasi/delete/{idPrestasi}', [PrestasiController::class, 'delete']);
    Route::get('/admin/prestasi/detail-prestasi/{idPrestasi}', [PrestasiController::class, 'detail']);
    // Jurusan
    Route::get('/admin/jurusan', [JurusanController::class, 'index']);
    Route::get('/admin/jurusan/create-form', [JurusanController::class, 'createForm']);
    Route::post('/admin/jurusan/create', [JurusanController::class, 'create']);
    Route::get('/admin/jurusan/edit-form/{idJurusan}', [JurusanController::class, 'editForm']);
    Route::put('/admin/jurusan/update/{idJurusan}', [JurusanController::class, 'update']);
    Route::delete('/admin/jurusan/delete/{idJurusan}', [JurusanController::class, 'delete']);
    Route::get('/admin/jurusan/detail-jurusan/{idJurusan}', [JurusanController::class, 'detail']);
    // Organisasi
    Route::get('/admin/organisasi/', [OrganisasiController::class, 'index']);
    Route::get('/admin/organisasi/create-form', [OrganisasiController::class, 'createForm']);
    Route::post('/admin/organisasi/create', [OrganisasiController::class, 'create']);
    Route::get('/admin/organisasi/edit-form/{idOrganisasi}', [OrganisasiController::class, 'editForm']);
    Route::put('/admin/organisasi/update/{idOrganisasi}', [OrganisasiController::class, 'update']);
    Route::delete('/admin/organisasi/delete/{idOrganisasi}', [OrganisasiController::class, 'delete']);
    Route::get('/admin/organisasi/detail-organisasi/{idOrganisasi}', [OrganisasiController::class, 'detail']);
});
