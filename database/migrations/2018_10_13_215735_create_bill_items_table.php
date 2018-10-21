<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_items', function (Blueprint $table) {
            $table->increments('idBillItem')->index();
            $table->double('price');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->integer('idBill')->unsigned()->index();
            $table->foreign('idBill')->references('idBill')->on('bills')->onDelte('cascade');

            $table->integer('idProduct')->index();
            $table->foreign('idProduct')->references('idProduct')->on('products')->onDelte('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_items');
    }
}
