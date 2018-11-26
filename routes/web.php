<?php

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


use App\Passport;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});




Route::resource('passports','PassportController');
Route::get('passports/home/list', 'PassportController@showlist');
Route::get('passports/home/show/{id}', 'PassportController@showsingle');



Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $user = \App\Passport::where('name','LIKE','%'.$q.'%')->get();
    if (empty($q)) {
        return view ('search')->withMessage('No Details found. Try to search again !');
        exit();
    }else

    if(count($user) > 0)
        return view('search')->withDetails($user)->withQuery ( $q );
    else return view ('search')->withMessage('No Details found. Try to search again !');

});
