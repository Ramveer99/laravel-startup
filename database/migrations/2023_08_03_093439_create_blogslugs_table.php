<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogslugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogslugs', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('auhtor');
            $table->date('current')->nullable();
            $table->string('tittle',150);
            $table->string('slug')->unique();
            $table->text('about');
            $table->string('photo',300)->nullable();
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
        Schema::dropIfExists('blogslugs');
    }
}
