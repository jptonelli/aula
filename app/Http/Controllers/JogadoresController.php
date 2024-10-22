<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogador;

class JogadoresController extends Controller
{
    public function index(){
        // SELECT * FROM CATEGORIA WHERE CAT_ATIVO = 1;
        $jogador = Jogador::where('cat_ativo', 1)->get();

        return view('jogadores.index', compact('jogador')); // compact('NOME DA VARIAVEL')
    }

    public function incluirJogador(Request $request){ // usa o Request quando a função do controller for receber dados da aplicação
        $jogador_nome = $request->input('jogador_nome');
        $jogador_estado = $request->input('jogador_estado');

        $nova = new Jogador();

        $nova->jogador_nome = $jogador_nome;
        $nova->jogador_estado = $jogador_estado;

        $nova->save();

        return redirect('/jogadores');
    }

    public function excluirJogador($id) {
        // SELECT * FROM CATEGORIA WHERE ID = ID
        $jogador = Jogador::where("id", $id)->first();
        $jogador ->cat_ativo = 0;
        $jogador->save();

        return redirect('/jogadores');
    }

    public function executaAlteracao(Request $request){
        $dado_nome = $request->input('jogador_nome');
        $dado_estado = $request->input('jogador_estado');
        $dado_id = $request->input('id');

        $jogador = Jogador::where("id", $dado_id)->first();
        $jogador->jogador_nome = $dado_nome;
        $jogador->jogador_estado = $dado_estado;

        $jogador->save();
        return redirect('/jogadores');
    }

    public function buscarAlteracao($id){
        $jogador = Jogador::where("id", $id)->first();

        return view('jogadores.alterar', compact('jogador'));

        return redirect('/jogadores');
    }
}
