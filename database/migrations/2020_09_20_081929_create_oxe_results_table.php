<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOxeResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oxe_results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('examid');
            $table->string('userid');
            $table->string('totalQ')->nullable();
            $table->string('writeQ');
            $table->string('wrongQ');
            $table->string('totalmark')->nullable();
            $table->string('Resultjson');
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
        Schema::dropIfExists('oxe_results');
    }
}
