<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modes', function (Blueprint $table) {
            $table->id();
            $table->string('mode_group')->nullable();
            $table->string('model')->nullable();
            $table->double('temperature')->nullable();
            $table->double('max_length')->nullable();
            $table->double('token_value')->nullable();
            $table->longText('stop_seq')->nullable();
            $table->double('top_p')->nullable();
            $table->double('freq_penalty')->nullable();
            $table->double('pre_penalty')->nullable();
            $table->double('best_of')->nullable();
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
        Schema::dropIfExists('modes');
    }
}
