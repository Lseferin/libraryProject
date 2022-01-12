<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use Illuminate\Http\Request;
use App\Models\Livro;

class LivrosController extends Controller
{
    public function create(){
//        return response()->json([
//            'livro' => 123
//        ]);
        return view( 'livros.create');
    }
    public function store(LivroRequest $request){
        try {
            Livro::create([
                'nome' => $request->nome,
                'autor' => $request->autor,
                'preco' => $request->preco,
            ]);
            return redirect('/livros/ver')
                ->with('mensagem', 'Livro cadastrado com sucesso');
        } catch (\Exception $e) {
            return redirect()
                ->route('livros_ver')
                ->with('mensagem', __('Opa, um erro inesperado aconteceu'));
        }
    }
    public function show(){

        if (\request('q')){
            $q= \request()->get('q');
            $livros = Livro::where('nome', 'LIKE', '%' . $q . '%')
                ->orWhere('autor', 'LIKE', '%' . $q . '%')
                ->paginate(2);
        }
        else{
            $livros = Livro::paginate(2);
        }
        return view('livros.todos',['livros' => $livros]);
    }
    public function destroy($id){
        $livro=Livro::findOrFail($id);
        $livro->delete();
        return redirect()->back()->with('mensagem', 'Livro excluído com sucesso');

    }
    public function edit($id){
        $livro = Livro::findOrFail($id);
        return view('livros.editar', ['livro' => $livro]);
    }

    public function update(LivroRequest $request, $id){
        try {
            $livro = Livro::findOrFail($id);
            $livro->update([
                'nome' => $request->nome,
                'autor' => $request->autor,
                'preco' => $request->preco,
            ]);
            return redirect('/livros/ver')->with('mensagem', 'Livro atualizado com sucesso');
        } catch (\Exception $e){
            report($e);
            return redirect()
                ->route('livros_ver')
                ->with('mensagem', __('Opa, houve um erro inesperado!'));
        }
    }

    public function search(){
        $livro = \App\Models\Livro::where('name','LIKE','%'.$q.'%')->orWhere('autor','LIKE','%'.$q.'%')->get();
        if(count($livro) > 0)
            return redirect('/livros/ver')->withDetails($livro)->withQuery ( $q );
        else return redirect('/livros/ver')->withMessage('No Details found. Try to search again !');

    }
}
