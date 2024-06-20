<?php

use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Route;

Route::get( 'lang/change', [LangController::class, 'change'] )->name( 'change_lang' );
Route::get( '/', function () {
    return view( 'welcome' );
} );