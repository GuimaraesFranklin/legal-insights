<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_unico_processo', 40)->nullable()->unique();
            $table->date('data_distribuicao',)->format('d.m.Y');
            $table->string('reu_principal', 200);
            $table->float('valor_causa', 10, 2);
            $table->string('vara', 60);
            $table->string('comarca', 100);
            $table->string('uf');
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
        Schema::dropIfExists('processos');
    }
}