<?php

use App\Http\Controllers\v1\Backend as Backend;
use App\Http\Controllers\v1\Backend\DestinasiController;
use App\Http\Controllers\v1\Frontend as Frontend;
use Illuminate\Support\Facades\Route;

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
// localization
if (file_exists(app_path('Http/Controllers/LocalizationController.php')))
{
    Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class , 'lang']);
}
// frontend
Route::get('/',[Frontend\HomeController::class,'index'])->name('home');
Route::get('destination',[Frontend\DestinasiController::class,'index'])->name('destinasi');
Route::get('destination/{slug}',[Frontend\DestinasiController::class,'detail'])->name('destinasi.detail');
Route::get('event',[Frontend\EventController::class,'index'])->name('event');
Route::get('event/{slug}',[Frontend\EventController::class,'detail'])->name('event.detail');
Route::get('tourist-map',[Frontend\PetaWisataController::class,'index'])->name('peta-wisata');
Route::get('tourist-map/{slug}',[Frontend\PetaWisataController::class,'detail'])->name('peta-wisata.detail');
Route::resource('about-us',Frontend\TentangKamiController::class);

// backend
Route::get('getkab',[DestinasiController::class,"getKabupaten"]);
Route::get('getkec',[DestinasiController::class,"getKecamatan"]);
Route::middleware(['auth'])->group(function () {
    Route::prefix('backoffice')->group(function () {
        Route::get('/',[Backend\BerandaController::class,'index'])->name('backoffice');
        Route::post('user/edit',[Backend\UserController::class,'editPassword'])->name('user.editPassword');
        Route::resource('user',Backend\UserController::class);
        // Route::get('events/{lang}', [EventController::class, 'index'])->name('events.data');
        Route::resource('events', Backend\EventController::class);
        Route::resource('category-events', Backend\CategoryEventController::class);
        Route::resource('destinasi', Backend\DestinasiController::class);
        Route::resource('category-destinasi', Backend\CategoryDestinasiController::class);
        Route::resource('peta-wisata', Backend\PetaWisataController::class);
        Route::resource('category-maps',Backend\CategoryMapsController::class);
        Route::resource('banner',Backend\BannerController::class);
        Route::resource('feedback-data', Backend\FeedbackController::class);
    });
});
require __DIR__.'/auth.php';
