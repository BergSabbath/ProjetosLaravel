<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimentos', function (Blueprint $table) {
            $table->integer('loja_id')->unsigned();
            $table->foreign('loja_id')->references('id')->on('lojas');
            $table->primary('loja_id');
            $table->string('verdura');
            $table->string('legume');
            $table->string('fruta');
            $table->string('cereal');
            $table->string('grao');
            $table->string('raiz');
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
        Schema::dropIfExists('alimentos');
    }
}
