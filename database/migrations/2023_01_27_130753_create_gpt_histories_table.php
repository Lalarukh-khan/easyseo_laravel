<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGptHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpt_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('template_id')->nullable();
            $table->string('template_name')->nullable();
            $table->enum('type',['complete','template']);
            $table->longText('prompt')->nullable();
            $table->longText('answer')->nullable();
            $table->longText('input')->nullable();
            $table->longText('instruction')->nullable();
            $table->longText('setting')->nullable();
            $table->bigInteger('prompt_tokens')->nullable();
            $table->bigInteger('completion_tokens')->nullable();
            $table->bigInteger('total_tokens')->nullable();
            $table->bigInteger('total_words')->nullable();
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
        Schema::dropIfExists('gpt_histories');
    }
}
