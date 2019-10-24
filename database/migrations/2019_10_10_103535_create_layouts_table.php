<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter\AlignFormatter;
use test\Mockery\Adapter\Phpunit\MockeryPHPUnitIntegrationTest;

class CreateLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->boolean('sidebar')->default(false);
            $table->string('bg-color')->default('#a0aec0');
            $table->string('text-color')->default('#000');

            $table->integer('cols')->default(3);
            $table->integer('rows')->default(2);

            $table->integer('border_width')->default(0);
            $table->string('border_radius')->default('0.25vw');
            $table->string('border_color')->default('#333333');
            $table->string('padding')->default('#333333');

            $table->string('info_padding')->default('1vw');
            $table->string('info_height')->default('4vw');
            $table->string('info_background_color')->default('#000');
            $table->boolean('title_show')->default(false);
            $table->string('title_size')->default('1vw');
            $table->string('title_color')->default('#000');
            $table->boolean('description_show')->default(false);
            $table->string('description_size')->default('0.8vw');
            $table->string('description_color')->default('#000');

            $table->string('back_padding')->default('0.8vw');
            $table->string('back_background_color')->default('#000');
            $table->string('back_text_color')->default('#000');
            $table->boolean('back_fullwidth')->default(true);

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
        Schema::dropIfExists('layouts');
    }
}
