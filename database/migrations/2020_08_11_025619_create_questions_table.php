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
            $table->string('judul', 100);
            $table->longText('isi');
            $table->timestamps();
            $table->integer('profile_id')->unsigned()->nullable();
            $table->integer('jawaban_tepat_id')->unsigned()->nullable();
            $table->foreign('profile_id')->references('id')->on('profiles')->nullable();
            //$table->foreign('jawaban_tepat_id')->references('id')->on('jawaban_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('questions');
    }
}
