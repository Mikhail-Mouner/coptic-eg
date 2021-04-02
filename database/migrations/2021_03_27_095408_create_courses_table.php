<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('brief')->nullable();
            $table->text('description')->nullable();
            $table->string('duration')->nullable();
            $table->string('location')->nullable();
            $table->string('main_photo')->default('courses/no-img.png');
            $table->boolean('online')->default(false);
            $table->bigInteger('category_id');
            $table->bigInteger('level_id');
            $table->bigInteger('add_by');
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
        Schema::dropIfExists('courses');
    }
}
