<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\frontend\pages\AboutController;
use App\Http\Controllers\frontend\pages\BlogController;
use App\Http\Controllers\frontend\pages\CareerController;
use App\Http\Controllers\frontend\pages\EventController;
use App\Http\Controllers\frontend\pages\HomeController;
use App\Http\Controllers\frontend\pages\PartnerController;
use App\Http\Controllers\frontend\pages\ServiceController;
use App\Models\Applying;
use App\View\Components\Applying as ComponentsApplying;
use Filament\Notifications\Notification;
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

// Start
Route::get('/dashboard', function () { // Route Dashboard
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__ . '/auth.php';
//End
Route::get('/login', function () {
    return redirect()->route('filament.auth.login');
})->name('login');

Route::resource('contact', ContactController::class)->only(['store']);

Route::group(['web'], function () {
    Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
});

Route::group(['web'], function () { // For index only
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::get('/industry_partner', [PartnerController::class, 'index'])->name('industry_partner');
    Route::get('/career', [CareerController::class, 'index'])->name('career');
    Route::get('/event', [EventController::class, 'index'])->name('event');
    Route::get('/publication', [BlogController::class, 'index'])->name('publication');
    Route::get('/about_us', [AboutController::class, 'index'])->name('about_us');
    Route::get('/contact_us', [ContactController::class, 'index'])->name('contact_us');
    Route::get('/publication-detail/{id}', [BlogController::class, 'show'])->name('publication-show');
    Route::get('/event-detail/{id}', [EventController::class, 'show'])->name('event-show');
    Route::get('/career-detail/{id}', [CareerController::class, 'show'])->name('career-show');
    Route::post('apply', [CareerController::class, 'store'])->name('apply.submit');
});

// //Page Detail
// Route::get('/career-detail', function () {
//     return view('frontend.pages.pages_detail.career_detail');
// });




