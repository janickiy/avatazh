<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author')->comment('автор отзыва');
            $table->text('message')->comment('отзыв');
            $table->tinyInteger('published')->default(0)->comment('публиковать: 0-нет, 1-да');
            $table->dateTime('published_at')->comment('время публикации');
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
        Schema::drop('user_reviews');
    }
}
