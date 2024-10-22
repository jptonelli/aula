<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(){
        // SELECT * FROM CATEGORIA WHERE CAT_ATIVO = 1;
        $categorias = Categoria::where('cat_ativo', 1)->get();

        return view('categoria.index', compact('categorias')); // compact('NOME DA VARIAVEL')
    }

    public function incluirCategoria(Request $request){ // usa o Request quando a função do controller for receber dados da aplicação
        $cat_nome = $request->input('cat_nome');
        $cat_descricao = $request->input('cat_descricao');

        $nova = new Categoria();

        $nova->cat_nome = $cat_nome;
        $nova->cat_descricao = $cat_descricao;

        $nova->save();

        return redirect('/categoria');
    }

    public function excluirCategoria($id) {
        // SELECT * FROM CATEGORIA WHERE ID = ID
        $cat = Categoria::where("id", $id)->first();
        $cat ->cat_ativo = 0;
        $cat->save();
    }

    public function buscarAlteracao($id){
        $categoria = Categoria::where("id", $id)->first();

        return view('categoria.alterar', compact('categoria'));
    }

    public function executaAlteracao(Request $request){
        $dado_nome = $request->input('cat_nome');
        $dado_desc = $request->input('cat_descricao');
        $dado_id = $request->input('id');

        $categoria = Categoria::where("id", $dado_id)->first();
        $categoria->cat_nome = $dado_nome;
        $categoria->cat_descricao = $dado_desc;

        $categoria->save();
        return redirect('/categoria');
    }
}


