<?php

use App\Http\Controllers\ListenerController;
use App\Http\Controllers\SurahController;
use App\Models\Listener;
use App\Models\Surah;
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

Route::get('/',[SurahController::class,'index']);


Route::get('/sound/{surah_name}',[ListenerController::class,'index'])->name('surah.listener');




Route::get('/dashboard', function () {

    $surahs = Surah::count();
    $listeners = Listener::count();
    return view('dashboard.starter', compact('surahs','listeners'));
})->middleware('auth');



// surahs

Route::post('/add_surah',[SurahController::class,'add_surah'])->middleware('auth');
Route::get('/dashboard/surah',[SurahController::class,'show_add_surah'])->middleware('auth');

Route::get('dashboard/all_surahs',[SurahController::class,'surahs'])->name('all_surahs')->middleware('auth');
Route::get('dashboard/surah/destroy/{id}', [SurahController::class,'surah_destroy'])->name('surah.destroy')->middleware('auth');
Route::get('dashboard/surah/edit/{id}', [SurahController::class,'surah_edit'])->name('surah.edit')->middleware('auth');
Route::patch('dashboard/surah/update/{id}', [SurahController::class,'surah_update'])->name('surah.update')->middleware('auth');



// listeners
Route::post('add_listener',[ListenerController::class,'add_listener'])->middleware('auth');
Route::get('/dashboard/listeners',[ListenerController::class,'listeners'])->middleware('auth');

Route::get('dashboard/all_listeners',[ListenerController::class,'all_listeners'])->name('all_listeners')->middleware('auth');
Route::get('dashboard/listener/destroy/{id}', [ListenerController::class,'listener_destroy'])->name('listener.destroy')->middleware('auth');
Route::get('dashboard/listener/edit/{id}', [ListenerController::class,'listener_edit'])->name('listener.edit')->middleware('auth');
Route::patch('dashboard/listener/update/{id}', [ListenerController::class,'listener_update'])->name('listener.update')->middleware('auth');


// search from ayat
Route::get('search_ayat',[ListenerController::class,'search_ayat']);

// search from surahs
Route::get('search_surahs',[SurahController::class,'search_surahs']);



Route::get('contact',[SurahController::class,'search_surahs']);