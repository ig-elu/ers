<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Institution extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->timestamps();
            $table->string('name');
            $table->integer('votemultiplier')->default(1)->nullable();
            $table->integer('countryphonecode')->nullable();
            $table->integer('country')->nullable();
            $table->string('consortia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institutions');
    }
}
