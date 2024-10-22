<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;

class TimeController extends Controller
{
    public function index(){
        // SELECT * FROM CATEGORIA WHERE CAT_ATIVO = 1;
        $times = Time::where('cat_ativo', 1)->get();

        return view('time.index', compact('times')); // compact('NOME DA VARIAVEL')
    }

    public function incluirTime(Request $request){ // usa o Request quando a função do controller for receber dados da aplicação
        $time_nome = $request->input('time_nome');
        $time_estado = $request->input('time_estado');

        $nova = new Time();

        $nova->time_nome = $time_nome;
        $nova->time_estado = $time_estado;

        $nova->save();

        return redirect('/time');
    }

    public function excluirTime($id) {
        // SELECT * FROM CATEGORIA WHERE ID = ID
        $time = Time::where("id", $id)->first();
        $time ->cat_ativo = 0;
        $time->save();

        return redirect('/time');
    }

    public function executaAlteracao(Request $request){
        $dado_nome = $request->input('time_nome');
        $dado_estado = $request->input('time_estado');
        $dado_id = $request->input('id');

        $time = Time::where("id", $dado_id)->first();
        $time->time_nome = $dado_nome;
        $time->time_estado = $dado_estado;

        $time->save();
        return redirect('/time');
    }

    public function buscarAlteracao($id){
        $time = Time::where("id", $id)->first();

        return view('time.alterar', compact('time'));

        return redirect('/time');
    }
}
