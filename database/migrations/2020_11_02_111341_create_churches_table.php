<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChurchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('churches', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('home_cell')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('watsup_number')->nullable();
            $table->string('marital_status')->nullable();
            $table->integer('no_of_children')->nullable();
            $table->integer('status')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();

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
        Schema::dropIfExists('churches');
    }
}
