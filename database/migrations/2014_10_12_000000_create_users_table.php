<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->text('image')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('unique_id')->nullable();
            $table->enum('user_type',['main', 'workspace'])->default('main');
            $table->integer('main_user_id')->nullable();
            $table->string('provider_name')->default('web')->nullable();
            $table->string('provider_id')->nullable();
            $table->boolean('has_package')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('time_zone')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
