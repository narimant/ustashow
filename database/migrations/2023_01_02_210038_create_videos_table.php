<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
            $table->text('VideoUrl');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('body');
            $table->text('images');
            $table->integer('ViewCount')->default(0);
            $table->integer('CommentCount')->default(0);
            $table->string('lang',10)->default('en');
            $table->boolean('status')->default(0);
            $table->string('seoTitle')->nullable();
            $table->string('seoDescription')->nullable();
            $table->string('seoKeyword')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
