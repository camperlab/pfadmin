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
        Schema::create('domain', function (Blueprint $table) {
            $table->string('domain')->primary();
            $table->string('description');
            $table->integer('aliases')->default(0);
            $table->integer('mailboxes')->default(0);
            $table->bigInteger('maxquota')->default(0);
            $table->bigInteger('quota')->default(0);
            $table->string('transport');
            $table->tinyInteger('backupmx')->default(0);
            $table->dateTime('created');
            $table->dateTime('modified');
            $table->tinyInteger('active')->default(1);
            $table->smallInteger('password_expiry')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domain');
    }
};
