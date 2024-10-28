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
        Schema::create('times', function (Blueprint $table) {
            $table->id(); // int, autoincremento
            $table->date("data_inscricao");
            $table->string("nome_time");
            $table->string("cores_time");
            $table->string("categoria_time");
            $table->string("nome_responsavel");
            $table->string("telefone");
            $table->string("email");
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
        Schema::dropIfExists('times');
    }
};
