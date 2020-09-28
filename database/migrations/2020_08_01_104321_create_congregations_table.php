<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongregationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Congregations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('email')->nullable(false)->unique();
            $table->string('contact')->nullable(false)->unique();
            $table->string('location')->nullable(false);
            $table->string('home_cell')->nullable(false);
            $table->string('marital_status')->nullable();
            $table->integer('no_of_children')->nullable();
            $table->integer('status');
            $table->string('gender');
            $table->integer('age');

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
        Schema::dropIfExists('Congregations');
    }
}
