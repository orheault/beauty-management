<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('idClient')->index();
            $table->timestamps();
            $table->integer('idReferringClient')->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('phoneNumber');
            $table->boolean('glueAllergy')->default(false);
            $table->char('style')->nullable();
            $table->text('eyelashNote')->nullable();
            $table->char('curve')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
