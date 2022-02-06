<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('type',10);
            $table->string('title');
            $table->text('body');
            $table->string('VideoUrl');
            $table->integer('number');
            $table->string('time',15)->default('00:00:00');
            $table->string('lang',10)->default('en');
            $table->boolean('status')->default(0);
            $table->integer('ViewCount')->default(0);
            $table->integer('CommentCount')->default(0);
            $table->integer('DownloadCount')->default(0);
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
        Schema::dropIfExists('episodes');
    }
}
