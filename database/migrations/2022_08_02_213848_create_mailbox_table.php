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
        Schema::create('mailbox', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('password');
            $table->string('name');
            $table->string('maildir');
            $table->bigInteger('quota')->default(0);
            $table->string('local_part');
            $table->string('domain')->index('domain');
            $table->dateTime('created');
            $table->dateTime('modified');
            $table->tinyInteger('active')->default(1);
            $table->string('phone', 30);
            $table->string('email_other');
            $table->string('token');
            $table->dateTime('token_validity');
            $table->dateTime('password_expiry');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailbox');
    }
};
