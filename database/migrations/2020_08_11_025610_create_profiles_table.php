<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('photo', 100); //receipt dir photo location
            $table->timestamps(); //create field cretaed_at and updated_at
        });

        $current_timestamp = Carbon::now()->toDateTimeString();
        $store = DB::table('profiles')->insert([
            'id' => 1,
            'name' => "riyan pratama",
            'email' => "riyan@mail.com",
            'photo' => "/img/photo.jpg",
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ]); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('profiles');
    }
}
