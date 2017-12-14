<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogUsedCar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalog_used_car', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mark')->comment('марка');
            $table->string('model')->comment('модель');
            $table->integer('price')->comment('цена');
            $table->integer('year')->comment('год');
            $table->integer('mileage')->comment('пробег');
            $table->string('gearbox')->comment('КПП');
            $table->string('drive')->comment('привод');
            $table->string('engine_type')->comment('тип двигателя');
            $table->integer('power')->comment('мощность двигателя');
            $table->string('body')->comment('кузов');
            $table->string('wheel')->comment('руль');
            $table->string('color')->comment('цвет');
            $table->string('salon')->commen('салон');
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->text('description')->comment('комментарий продовца')->nullable();
            $table->boolean('published');
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
        Schema::drop('catalog_used_car');
    }
}
