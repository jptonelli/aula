<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escalados;

class JogadoresController extends Controller
{
    public function index(){
        // SELECT * FROM CATEGORIA WHERE CAT_ATIVO = 1;
        $jogador = Escalados::where('cat_ativo', 1)->get();

        return view('jogadores.index', compact('jogador')); // compact('NOME DA VARIAVEL')
    }

    public function incluirJogador(Request $request){ // usa o Request quando a função do controller for receber dados da aplicação
        $jogador_nome = $request->input('jogador_nome');
        $jogador_nascimento = $request->input('jogador_nascimento');
        $jogador_posicao = $request->input('jogador_posicao');
        $nome_tecnico = $request->input('nome_tecnico');
        $aux_tecnico = $request->input('aux_tecnico');

        $nova = new Escalados();

        $nova->jogador_nome = $jogador_nome;
        $nova->jogador_nascimento = $jogador_nascimento;
        $nova->jogador_posicao = $jogador_posicao;
        $nova->nome_tecnico = $nome_tecnico;
        $nova->aux_tecnico = $aux_tecnico;

        $nova->save();

        return redirect('/jogadores');
    }

    public function excluirJogador($id) {
        // SELECT * FROM CATEGORIA WHERE ID = ID
        $jogador = Escalados::where("id", $id)->first();
        $jogador ->cat_ativo = 0;
        $jogador->save();

        return redirect('/jogadores');
    }

    public function executaAlteracao(Request $request){
        $dado_nome = $request->input('jogador_nome');
        $dado_dataNascimento = $request->input('jogador_nascimento');
        $dado_posicao = $request->input('jogador_posicao');
        $dado_nomeTec = $request->input('nome_tecnico');
        $dado_auxTec = $request->input('aux_tecnico');
        $dado_id = $request->input('id');

        $jogador = Escalados::where("id", $dado_id)->first();
        $jogador->jogador_nome = $dado_nome;
        $jogador->jogador_nascimento = $dado_dataNascimento;
        $jogador->jogador_posicao = $dado_posicao;
        $jogador->nome_tecnico = $dado_nomeTec;
        $jogador->aux_tecnico = $dado_auxTec;

        $jogador->save();
        return redirect('/jogadores');
    }

    public function buscarAlteracao($id){
        $jogador = Escalados::where("id", $id)->first();

        return view('/jogadores.alterar', compact('jogador'));

        return redirect('/jogadores');
    }
}
