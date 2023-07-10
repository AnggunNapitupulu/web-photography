<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamerasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  protected $TABLE = 'cameras';
  public function up()
  {
    Schema::create($this->TABLE, function (Blueprint $table) {
      $table->id();
      $table->string('camera', 255)->default(NULL)->nullable();
      $table->string('slug_camera', 255)->default(NULL)->nullable();
      $table->string('photo', 255)->default(NULL)->nullable();
      $table->integer('price')->default(NULL)->nullable();
      $table->text('description')->default(NULL)->nullable();
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
    Schema::dropIfExists($this->TABLE);
  }
}
