<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('color',50)->nullable();
            $table->string('slug');
            $table->string('lang',10)->default('en');
            $table->string('seoTitle')->nullable();
            $table->string('seoDescription')->nullable();
            $table->string('seoKeyword')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->string('category_mode',50)->default('blog');
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
        Schema::dropIfExists('categories');
    }
}
