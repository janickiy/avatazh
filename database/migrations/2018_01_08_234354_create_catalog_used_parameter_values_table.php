<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogUsedcarParameterValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_usedcar_parameter_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_parameter')->index('id_parameter');
            $table->integer('id_car')->index('id_car');
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
        Schema::drop('catalog_used_parameter_values');
    }
}
