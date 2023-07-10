<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $TABLE = 'galleries';
    const parentTable = 'cat_galleries';
    public function up()
    {
        Schema::create($this->TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_gallery_id');
            $table->string('title',255);
            $table->string('path_image',255);
            // make foreign key to parentTable
            $table->foreign('cat_gallery_id')->references('id')->on(self::parentTable)
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
        Schema::dropIfExists($this->TABLE);
    }
}
