<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubscriptionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subscription_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('user_package_id');
            $table->integer('old_package_id')->nullable();
            $table->integer('new_package_id')->nullable();
            $table->integer('paddle_subscription_id')->nullable();
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
        Schema::dropIfExists('user_subscription_logs');
    }
}