<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->string('username')->unique()->primary();
            $table->string('password');
            $table->dateTime('created');
            $table->dateTime('modified');
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('superadmin')->default(0);
            $table->string('phone', 30);
            $table->string('email_other');
            $table->string('token');
            $table->datetime('token_validity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
};
