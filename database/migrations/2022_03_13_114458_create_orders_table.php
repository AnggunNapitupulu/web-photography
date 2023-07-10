<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  protected $TABLE = 'orders';
  const parentTableUsers = 'users';
  const parentTableServices = 'services';
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('service_id');
      $table->unsignedBigInteger('user_id');
      $table->string('name', 255);
      $table->string('email', 255);
      $table->string('phone', 255);
      $table->timestamp('service_date')->default(NULL)->nullable();
      // make foreign key to parentTableUsers
      $table->foreign('user_id')->references('id')->on(self::parentTableUsers)
        ->onUpdate('cascade')
        ->onDelete('cascade');
      // make foreign key to parentTableServices
      $table->foreign('service_id')->references('id')->on(self::parentTableServices)
        ->onUpdate('cascade')
        ->onDelete('cascade');
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
    Schema::dropIfExists('orders');
  }
}
