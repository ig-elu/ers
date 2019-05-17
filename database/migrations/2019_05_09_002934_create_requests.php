<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('groupcode')->nullable();
            $table->integer('institutionid')->nullable();
            $table->string('requester')->nullable();
            $table->string('requesteremail')->nullable();
            $table->string('productversion')->nullable();
            $table->string('username')->nullable();
            $table->string('title')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('productcode')->nullable();
            $table->string('modulecode')->nullable();
            $table->string('vendorincidentno')->nullable();
            $table->string('vendorproblemno')->nullable();
            $table->integer('vendorcomplexitypoints')->nullable();
            $table->mediumText('vendorcomplexitypointsexplanation')->nullable();
            $table->string('implementationversion')->nullable();
            $table->string('statuscode')->default('new');
            $table->string('vendorstatuscode')->nullable();
            $table->tinyInteger('visible')->default(1);
            $table->string('publisher')->nullable();
            $table->string('relatedurl')->nullable();
            $table->string('url')->nullable();
            $table->tinyInteger('language_specific')->default(0);
            $table->string('regionalcode')->default(0);
            $table->mediumText('notes')->nullable();
            $table->string('alternativetitle')->nullable();
            $table->mediumText('fulltext')->nullable();
            $table->string('scope')->nullable();
            $table->string('rejectreason')->nullable();
            $table->string('protocolplatform')->nullable();
            $table->string('titlelisturl')->nullable();
            $table->string('publishercontact')->nullable();
            $table->string('publisheremail')->nullable();
            $table->string('publisherphone')->nullable();
            $table->boolean('free')->nullable(); // free
            $table->integer('authentication')->nullable();
            $table->string('provider')->nullable();
            $table->string('ballottext')->nullable();
            $table->mediumText('privatenotes')->nullable();
            $table->string('relatedsinos')->nullable();
            $table->string('internalid')->nullable();
            $table->tinyInteger('consortium')->nullable();
            $table->string('relatedsystemcode')->nullable(); // ils
            $table->mediumText('problemimpact')->nullable();
            $table->mediumText('expectedoutcome')->nullable();
            $table->mediumText('usecases')->nullable();
            $table->mediumText('justification')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
