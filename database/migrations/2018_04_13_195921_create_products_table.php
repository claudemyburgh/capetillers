<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('sku')->nullable();
            $table->string('name')->index();
            $table->string('slug')->index();
            $table->string('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->enum('availability', ['instock', 'out-of-stock', 'pre-order']);
            $table->boolean('live')->default(true);
            $table->boolean('onsale')->default(false);
            $table->double('price', 15, 2)->nullable();
            $table->double('salesprice', 15, 2)->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
