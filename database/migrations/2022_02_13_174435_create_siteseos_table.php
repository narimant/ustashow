<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteseosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siteseos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_title');
            $table->string('site_description');
            $table->string('site_keyword')->nullable();
            $table->string('lang',25)->unique();
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
        Schema::dropIfExists('siteseos');
    }
}
