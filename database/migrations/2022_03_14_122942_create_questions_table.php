<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->string('image');
            $table->string('A');
            $table->string('B');
            $table->string('C');
            $table->string('D');
            $table->string('E')->nullable();
            $table->string('answer');
            $table->text('hint');
            $table->string('subject');
            $table->string('topic');
            $table->text('exam_year');
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
        Schema::dropIfExists('questions');
    }
}
