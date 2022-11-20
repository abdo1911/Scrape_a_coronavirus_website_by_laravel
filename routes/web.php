 <?php

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

Route::get('/',[App\Http\Controllers\ScraperContoller::class,'show'])->name('show');
Route::get('/job',[App\Http\Controllers\ScraperContoller::class,'scraper'])->name('scraper');
Route::get('scraper', [App\Http\Controllers\ScraperContoller::class, 'store'])->name('scraper.store');
Route::get('information', [App\Http\Controllers\ScraperContoller::class, 'information'])->name('scraper.information')->middleware('auth');
 Route::get('max_cases', [App\Http\Controllers\ScraperContoller::class, 'max_cases'])->name('scraper.max_cases')->middleware('auth');
Route::get('max_death', [App\Http\Controllers\ScraperContoller::class, 'max_death'])->name('scraper.max_death')->middleware('auth');
Route::get('max_recovered', [App\Http\Controllers\ScraperContoller::class, 'max_recovered'])->name('scraper.max_recovered')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

