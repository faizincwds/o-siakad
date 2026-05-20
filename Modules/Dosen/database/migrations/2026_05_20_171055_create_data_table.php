<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

class CreateDataTable extends Migration
{
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data');
    }
}