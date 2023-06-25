<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyPacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_packs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('package_id');
            $table->integer('user_package_id');
            $table->bigInteger('words');
            $table->bigInteger('research_limit')->default(0);
            $table->bigInteger('workspace_users')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('monthly_packs');
    }
}
