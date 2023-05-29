<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->longText('description');
            $table->longText('command_box');
            $table->text('icon');
            $table->text('video_url')->nullable();
            $table->boolean('has_language')->default(0);
            $table->boolean('is_premium')->default(0);
            $table->boolean('is_business')->default(0);
            $table->boolean('status')->default(0);
            $table->integer('added_by_id');
            $table->softDeletes();
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
        Schema::dropIfExists('templates');
    }
}
