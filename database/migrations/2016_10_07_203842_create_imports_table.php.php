<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('imports', function(Blueprint $table){
      $table->increments('id');

      $table->integer('user_id')->unsigned()->index();
      $table->foreign('user_id')->references('id')->on('users');
      $table->string('filename');
      $table->boolean('status');

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
    Schema::drop('imports');
  }
}
