<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAtendidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendidos', function (Blueprint $table) {
            $table->unsignedInteger('id', 45);
            $table->integer('cliente_id');
            $table->string('nombre', 100);
            $table->integer('tipo_cola');
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
        Schema::dropIfExists('atendidos');
    }
}
