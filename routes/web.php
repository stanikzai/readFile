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
    $file =  File::get('nikola.txt');
    // convert file content to array for looping
    $file  = explode(' ', $file );
    $repeatedWords = [];
    // to find the number of repeation of each words
    foreach ($file as $word) {
        if (isset($repeatedWords[$word])) {
            $repeatedWords[$word] += 1;
        } else {
            $repeatedWords[$word] = 1;
        }
    }
    $finalArray = [];
    foreach ($repeatedWords as $word => $count) {
        $finalArray[] = [
            'repeatedWord' => $word,
            'repetation' => $count,
            'score' => $count/100,
        ];
    }
    // $finalArray = collect($finalArray)->sortBy('repetation')->reverse()->toArray();
    return $finalArray;
});

Route::get('readFile', function(){
    $file =  File::get('nikola.txt');
    $file  = explode(' ', $file );
    // return $file;
    $repeatedWords = [];
    foreach ($file as $word) {
        if (isset($repeatedWords[$word])) {
            $repeatedWords[$word]+= 1;
        } else {
            $repeatedWords[$word] = 1;
        }
    }
// return $repeatedWords;
    $finalArray = [];
    foreach ($repeatedWords as $word => $count) {
        $finalArray[] = [
            'repeatedWord' => $word,
            'repetation' => $count,
            'score' => $count/100,
        ];
    }
    // $finalArray = collect($finalArray)->sortBy('repetation')->reverse()->toArray();
    return $finalArray;
});