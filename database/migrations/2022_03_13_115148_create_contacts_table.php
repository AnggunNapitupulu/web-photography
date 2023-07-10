<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('email',255);
            $table->string('phone',255);
            $table->longText('bio')->nullable();
            $table->string('photo',255)->nullable();
            $table->string('instagram',255)->nullable();
            $table->string('linkedin',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('facebook',255)->nullable();
            $table->string('dribble',255)->nullable();
            $table->string('pinterest',255)->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
