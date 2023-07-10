<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReturnCameras extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  protected $TABLE = 'order_cameras';
  const parentTableUsers = 'users';
  const parentTableCameras = 'cameras';
  public function up()
  {
    Schema::create('return_cameras', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('camera_id');
      $table->unsignedBigInteger('user_id');
      $table->string('name', 255);
      $table->string('email', 255);
      $table->string('phone', 255);
      $table->string('photo', 255);
      // make foreign key to parentTableUsers on Update cascade on Delete cascade
      $table->foreign('user_id')->references('id')->on(self::parentTableUsers)
        ->onUpdate('cascade')
        ->onDelete('cascade');
      // make foreign key to parentTableCameras on Update cascade on Delete cascade
      $table->foreign('camera_id')->references('id')->on(self::parentTableCameras)
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->timestamp('order_date')->default(NULL)->nullable();
      $table->timestamp('delivery_date')->default(NULL)->nullable();
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
    Schema::dropIfExists('order_cameras');
  }
}
