<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone')->nullable();
            $table->tinyInteger('no1')->default('0');
            $table->tinyInteger('no2')->default('0');
            $table->tinyInteger('no3')->default('0');
            $table->tinyInteger('no4')->default('0');
            $table->tinyInteger('no5')->default('0');
            $table->tinyInteger('no6')->default('0');
            $table->tinyInteger('no7')->default('0');
            $table->tinyInteger('no8')->default('0');
            $table->tinyInteger('no9')->default('0');
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
        Schema::dropIfExists('signs');
    }
}
