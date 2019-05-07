<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstitutionLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('productcode');
            $table->integer('institutionid');
        });
        Schema::create('institution_user_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('institutionid');
            $table->string('groupcode');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institution_products');
        Schema::dropIfExists('institution_user_groups');

    }
}
