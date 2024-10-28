<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escalados', function (Blueprint $table) {
            $table->id(); // int, autoincremento
            $table->string("jogador_nome");
            $table->date("jogador_nascimento");
            $table->string("jogador_posicao");
            $table->string("nome_tecnico");
            $table->string("aux_tecnico");
            $table->boolean("cat_ativo")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escalados');
    }
};
