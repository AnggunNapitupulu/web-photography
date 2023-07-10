<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $TABLE = 'cat_galleries';
    public function up()
    {
        Schema::create($this->TABLE, function (Blueprint $table) {
            $table->id();
            $table->string('category',255);
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
