<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Times;

class TimeController extends Controller
{
    public function index(){
        // SELECT * FROM CATEGORIA WHERE CAT_ATIVO = 1;
        $times = Times::where('cat_ativo', 1)->get();

        return view('time.index', compact('times')); // compact('NOME DA VARIAVEL')
    }

    public function incluirTime(Request $request){ // usa o Request quando a função do controller for receber dados da aplicação
        $data_inscricao = $request->input('data_inscricao');
        $nome_time = $request->input('nome_time');
        $cores_time = $request->input('cores_time');
        $categoria_time = $request->input('categoria_time');
        $nome_responsavel = $request->input('nome_responsavel');
        $telefone = $request->input('telefone');
        $email = $request->input('email');


        $nova = new Times();

        $nova->data_inscricao = $data_inscricao;
        $nova->nome_time = $nome_time;
        $nova->cores_time = $cores_time;
        $nova->categoria_time = $categoria_time;
        $nova->nome_responsavel = $nome_responsavel;
        $nova->telefone = $telefone;
        $nova->email = $email;


        $nova->save();

        return redirect('/time');
    }

    public function excluirTime($id) {
        // SELECT * FROM CATEGORIA WHERE ID = ID
        $time = Times::where("id", $id)->first();
        $time ->cat_ativo = 0;
        $time->save();

        return redirect('/time');
    }

    public function executaAlteracao(Request $request){
        $dado_nome = $request->input('nome_time');
        $dado_cores = $request->input('cores_time');
        $dado_categoria = $request->input('categoria_time');
        $dado_resp = $request->input('nome_responsavel');
        $dado_tel = $request->input('telefone');
        $dado_email = $request->input('email');
        $dado_id = $request->input('id');

        $time = Times::where("id", $dado_id)->first();
        $time->nome_time = $dado_nome;
        $time->cores_time = $dado_cores;
        $time->categoria_time = $dado_categoria;
        $time->nome_responsavel = $dado_resp;
        $time->telefone = $dado_tel;
        $time->email = $dado_email;
        
        $time->save();
        return redirect('/time');
    }

    public function buscarAlteracao($id){
        $time = Times::where("id", $id)->first();

        return view('time.alterar', compact('time'));

        return redirect('/time');
    }
}
