<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('body');
            $table->text('images');
            $table->integer('ViewCount')->default(0);
            $table->integer('CommentCount')->default(0);
            $table->string('lang',10)->default('en');
            $table->string('attachTo',100)->nullable();
            $table->boolean('status')->default(0);
            $table->string('seoTitle')->nullable();
            $table->string('seoDescription')->nullable();
            $table->string('seoKeyword')->nullable();
            $table->boolean('commentStatus')->default(0);
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
        Schema::dropIfExists('pages');
    }
}
