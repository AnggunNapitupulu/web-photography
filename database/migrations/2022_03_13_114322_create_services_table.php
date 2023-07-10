<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $TABLE = 'services';
    public function up()
    {
        Schema::create($this->TABLE, function (Blueprint $table) {
            $table->id();
            $table->string('service',255);
            $table->string('slug_service',255);
            $table->text('description');
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
