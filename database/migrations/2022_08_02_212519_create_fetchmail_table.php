<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fetchmail', function (Blueprint $table) {
            $table->id();
            $table->string('mailbox');
            $table->string('src_server');
            $table->enum('src_auth', [
                'password',
                'kerberos_v5',
                'kerberos',
                'kerberos_v4',
                'gssapi',
                'cram-md5',
                'otp',
                'ntlm',
                'msn',
                'ssh',
                'any'
            ])->nullable();
            $table->string('src_user');
            $table->string('src_password');
            $table->string('src_folder');
            $table->integer('poll_time');
            $table->tinyInteger('fetchall')->default(0);
            $table->tinyInteger('keep')->default(0);
            $table->enum('protocol', [
                'POP3',
                'IMAP',
                'POP2',
                'ETRN',
                'AUTO'
            ])->nullable();
            $table->tinyInteger('usessl')->default(0);
            $table->text('extra_options')->nullable();
            $table->text('returned_text')->nullable();
            $table->string('mda');
            $table->tinyInteger('sslcertck')->default(0);
            $table->string('sslcertpath');
            $table->string('sslfingerprint');
            $table->string('domain');
            $table->tinyInteger('active')->default(0);
            $table->dateTime('created');
            $table->dateTime('modified');
            $table->integer('src_port')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fetchmail');
    }
};
