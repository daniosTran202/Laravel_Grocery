<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name',150);
            $table->float('price',9,3);
            $table->float('sale_price',9,3);
            $table->text('description');
            $table->Integer('category_id')->foreign('category_id')->references('id')->on('categories');
            $table->string('image',150 );
            $table->timestamps('created_at');
            $table->timestamps('updated_at',now());
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
