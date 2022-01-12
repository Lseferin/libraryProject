<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;



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

Route::get('/convert-to-json', function () {
    return App\Livros::paginate(5);
});

Route::post('search',function(){
//    $q = Input::get ( 'q' );
//    $livro = \App\Models\Livro::where('name','LIKE','%'.$q.'%')->orWhere('autor','LIKE','%'.$q.'%')->get();
//    if(count($livro) > 0)
//        return redirect('/livros/ver')->withDetails($livro)->withQuery ( $q );
//    else return redirect('/livros/ver')->withMessage('No Details found. Try to search again !');
    $q = request()->get('q');
    if ($q != ""){
        $livro = \App\Models\Livro::where('nome', 'LIKE', '%' . $q . '%')
            ->orWhere('autor', 'LIKE', '%' . $q . '%')
            ->get();
        if (count($livro) > 0)
            return view('livros.search')->withDetails($livro)->withQuery($q);
    }
        return view('livros.search')->withMessage("Nenhum resultado encontrado!");
});


Route::get('/livro/novo','LivrosController@create')->name('criar_livro');
Route::post('/livro/novo','LivrosController@store')->name('salvar_livro');
Route::get('/livros/ver','LivrosController@show')->name('livros_ver');
Route::get('/livro/del/{id}','LivrosController@destroy')->name('excluir_livro');
Route::get('/livro/edit/{id}','LivrosController@edit')->name('editar_livro');
Route::post('/livro/edit/{id}','LivrosController@update')->name('atualizar_livro');
