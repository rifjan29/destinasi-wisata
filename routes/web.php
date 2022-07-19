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
    Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class , 'lang'])->name('localization');
}
// frontend
Route::get('/',[Frontend\HomeController::class,'index'])->name('home');
Route::get('sejarah',[Frontend\SejarahController::class,'index'])->name('sejarah');
Route::get('fasilitas',[Frontend\FasilitasController::class,'index'])->name('fasilitas');
Route::get('aktivitas',[Frontend\AktivitasController::class,'index'])->name('aktivitas');
Route::get('galeri',[Frontend\GaleriController::class,'index'])->name('galeri');
Route::get('event',[Frontend\EventController::class,'index'])->name('event');
Route::get('event/{slug}',[Frontend\EventController::class,'detail'])->name('event.detail');
Route::get('tourist-map',[Frontend\PetaWisataController::class,'index'])->name('peta-wisata');
Route::get('tourist-map/{slug}',[Frontend\PetaWisataController::class,'detail'])->name('peta-wisata.detail');
Route::resource('about-us',Frontend\TentangKamiController::class);

// backend
Route::middleware(['auth'])->group(function () {
    Route::prefix('backoffice')->group(function () {
        Route::get('/',[Backend\BerandaController::class,'index'])->name('backoffice');
        Route::post('user/edit',[Backend\UserController::class,'editPassword'])->name('user.editPassword');
        Route::resource('user',Backend\UserController::class);
        // Route::get('events/{lang}', [EventController::class, 'index'])->name('events.data');
        Route::resource('category-events', Backend\CategoryEventController::class); //category event
        Route::resource('events', Backend\EventController::class); // events
        Route::resource('peta-wisata', Backend\PetaWisataController::class); //cms map
        Route::resource('banner',Backend\BannerController::class); //banner
        Route::resource('feedback-data', Backend\FeedbackController::class);//feedback data
        Route::resource('galeri',Backend\GaleriController::class); // galeri data
        Route::resource('contact-us',Backend\ContactUsController::class); //contact us
        Route::resource('aktivitas',Backend\AktivitasController::class); //aktivitas us
        Route::resource('sejarah',Backend\SejarahController::class); //sejarah us
        Route::resource('fasilitas',Backend\FasilitasController::class); //fasilitas us
    });
});
require __DIR__.'/auth.php';
