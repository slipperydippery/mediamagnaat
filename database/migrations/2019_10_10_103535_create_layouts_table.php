<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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
            $table->integer('border')->default(0);
            $table->integer('border-radius')->default(0);
            $table->boolean('sidebar')->default(false);
            $table->string('color')->default('rgba(0,0,0,0)');
            $table->string('text-color')->default('#fff');
            $table->string('bt-text')->default('rgba(0,0,0,0)');
            $table->string('text-size')->default('rgba(0,0,0,0)');
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
