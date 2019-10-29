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

            $table->string('bg_color')->default('rgba(0,0,0,0.3)');
            $table->string('text_color')->default('#000');
            $table->integer('padding_x')->default(5);
            $table->integer('padding_y')->default(3);

            $table->integer('cols')->default(4);
            $table->integer('rows')->default(2);

            $table->boolean('sidebar_show')->default(false);
            $table->integer('sidebar_description_size')->default(70);
            $table->string('sidebar_background_color')->default('rgba(255, 255, 255, 0.8)');
            $table->boolean('sidebar_fullheight')->default(true);
            $table->string('sidebar_text_color')->default('#333333');
            $table->integer('sidebar_padding_x')->default(15);
            $table->integer('sidebar_padding_y')->default(30);

            $table->integer('border_width')->default(0);
            $table->integer('border_radius')->default(0);
            $table->string('border_color')->default('#333333');
            $table->integer('card_padding_x')->default(10);
            $table->integer('card_padding_y')->default(10);
            $table->integer('card_margin_x')->default(10);
            $table->integer('card_margin_y')->default(10);
            $table->boolean('card_shadow_show')->default(true);
            $table->integer('card_shadow_size')->default('5');
            $table->string('card_shadow_color')->default('rgba(0,0,0,0.3)');

            $table->integer('info_padding_x')->default('6');
            $table->integer('info_padding_y')->default('3');
            $table->integer('info_height')->default('40');
            $table->string('info_background_color')->default('rgba(255, 255, 255, 0.8)');
            $table->boolean('info_title_show')->default(true);
            $table->integer('info_title_size')->default('70');
            $table->string('info_title_color')->default('#000');
            $table->boolean('description_show')->default(true);
            $table->integer('description_size')->default('50');
            $table->string('description_color')->default('#000');
            $table->integer('description_length')->default('90');

            $table->string('back_text')->default('<< terug naar ');
            $table->integer('back_size')->default('70');
            $table->boolean('back_include_title')->default(true);
            $table->integer('back_padding_x')->default('2');
            $table->integer('back_padding_y')->default('1');
            $table->string('back_background_color')->default('rgba(255, 255, 255, 0.8)');
            $table->string('back_text_color')->default('#000');
            $table->boolean('back_fullwidth')->default(true);
            $table->boolean('back_absolute')->default(true);
            $table->boolean('back_bottom')->default(true);

            $table->boolean('title_show')->default(true);
            $table->integer('title_size')->default('140');
            $table->integer('title_padding_x')->default('2');
            $table->boolean('title_center')->default(true);
            $table->integer('title_padding_y')->default('1');
            $table->string('title_background_color')->default('rgba(255, 255, 255, 0.8)');
            $table->string('title_text_color')->default('#000');
            $table->boolean('title_fullwidth')->default(true);
            $table->boolean('title_absolute')->default(true);
            $table->boolean('title_bottom')->default(false);

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
