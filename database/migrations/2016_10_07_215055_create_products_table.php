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
    Schema::create('products', function(Blueprint $table){
      $table->increments('id');
      $table->string('lm')->unique();
      $table->string('name');
      $table->text('description');
      $table->string('category');
      $table->boolean('free_shipping');
      $table->decimal('price', 12, 2);
      $table->integer('user_id')->unsigned();
      $table->integer('import_id')->unsigned();
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('import_id')->references('id')->on('import');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('products');
  }
}
