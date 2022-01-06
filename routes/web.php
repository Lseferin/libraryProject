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

Route::get('/', function () {
    return redirect('/livros/ver');
});

Route::get('/livro/novo','LivrosController@create')->name('criar_livro');
Route::post('/livro/novo','LivrosController@store')->name('salvar_livro');
Route::get('/livros/ver','LivrosController@show')->name('livros_ver');
Route::get('/livro/del/{id}','LivrosController@destroy')->name('excluir_livro');
Route::get('/livro/edit/{id}','LivrosController@edit')->name('editar_livro');
Route::post('/livro/edit/{id}','LivrosController@update')->name('atualizar_livro');
