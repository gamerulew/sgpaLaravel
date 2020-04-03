<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use \Illuminate\Support\Facades\Request;
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
Route::get('/login',function (){
    return view('login');
})->name('login');
Route::post('/login','MainController@logarUsuario')->name('loginPost');

Route::get('/registrar',function (){
    return view('registrar');
})->name('register');
Route::post('/registrarPost','MainController@cadastrarUsuario')->name('registrarPost');
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>'auth'],function (){
    Route::get('/home','MainController@home')->name('home');
    Route::post('/logout','MainController@deslogarUsuario')->name('logout');
    //Apiários
    Route::get('/apiarios','MainController@apiarios')->name('apiarios');
    Route::get('/cadastrarApiario','MainController@formCadastrarApiario')->name('cadastrarApiario');
    Route::post('/cadastrarApiario','MainController@cadastrarApiario')->name('cadastrarApiarioPost');
    Route::get('/apiario/{id}','MainController@apiario')->name('apiario');
    Route::post('/apiario','MainController@editarApiario')->name('editarApiarioPost');
    Route::get('/deletarApiario','MainController@deletarApiario')->name('deletarApiario');
    //Galões
    Route::get('/galoes','MainController@galoes')->name('galoes');
    Route::get('/cadastrarGalao','MainController@formCadastrarGalao')->name('cadastrarGalao');
    Route::post('/cadastrarGalao','MainController@cadastrarGalao')->name('cadastrarGalaoPost');
    Route::get('/galao/{id}','MainController@galao')->name('galao');
    Route::post('/galao','MainController@editarGalao')->name('editarGalaoPost');
    Route::get('/deletarGalao','MainController@deletarGalao')->name('deletarGalao');
});
