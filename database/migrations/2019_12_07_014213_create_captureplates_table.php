<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaptureplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('captureplates', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nomeImg', 200);
            $table->string('placa', 10);
            $table->dateTime('datafoto');
            $table->dateTime('datasistema');
            $table->string('origemplaca', 200);
            $table->string('ID_Device', 200);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('captureplates');
    }
}
