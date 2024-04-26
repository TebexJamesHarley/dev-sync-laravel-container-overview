<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('text', function () {
   echo Text::getText();
});

Route::get('dep', function (\App\Services\Contracts\DependentInterface $dependent) {
   echo $dependent->getValue();
});

Route::get('increment', function (\App\Services\Contracts\NumInterface $numService, \App\Services\NumServiceTwo $numServiceTwo, \App\Services\NumServiceThree $numServiceThree) {
    echo $numService->increment();
    echo $numService->increment();
    echo $numService->increment();

    echo ' ';

    echo $numServiceTwo->increment();
    echo $numServiceTwo->increment();
    echo $numServiceTwo->increment();

    echo ' ';

    echo $numServiceThree->increment();
    echo $numServiceThree->increment();
    echo $numServiceThree->increment();

    echo $numServiceThree->value;

//    echo app('App\Services\NumService')->increment();
//    echo app('App\Services\NumService')->increment();
//    echo app('App\Services\NumService')->increment();
//
//    echo ' ';
//
//    echo app('App\Services\NumServiceTwo')->increment();
//    echo app('App\Services\NumServiceTwo')->increment();
//    echo app('App\Services\NumServiceTwo')->increment();
});
