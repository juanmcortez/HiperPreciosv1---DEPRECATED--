<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();

            $table->string('name', 128)->nullable();
            $table->longText('store_url')->nullable();

            $table->boolean('is_vtex_store')->nullable()->default(false);

            $table->dateTime('last_products_update')->nullable();
            $table->integer('total_products')->nullable();
            $table->integer('total_categories')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('stores');
    }
}
