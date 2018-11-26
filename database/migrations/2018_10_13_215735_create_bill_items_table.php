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
            $table->increments('id')->index();
            $table->double('price');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->unsignedInteger('product_id')->index();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelte('cascade');

            $table->unsignedInteger('bill_id')->index();
            $table->foreign('bill_id')
                ->references('id')
                ->on('bills')
                ->onDelte('cascade');
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
