<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOxeQuestionMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oxe_question_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exam_id')->nullable();
            $table->string('question')->nullable();
            $table->string('ans')->nullable();
            $table->string('option')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('oxe_question_masters');
    }
}
