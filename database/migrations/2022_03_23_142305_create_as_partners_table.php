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
        Schema::create('as_partners', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('email')->unique();
            $table->string('target_url');
            $table->text('certificate');
            $table->text('private_key');
            $table->string('private_key_pass_phrase');
            $table->string('auth_method')->nullable();
            $table->string('auth_user');
            $table->string('auth_password');
            $table->string('content_type');
            $table->boolean('compression')->default('0');;
            $table->string('compression_type')->nullable();
            $table->string('signature_algorithm')->nullable();
            $table->boolean('signature_algorithm_required')->default('0');
            $table->string('encryption_algorithm')->nullable();
            $table->string('content_transfer_encoding');
            $table->string('subject');
            $table->string('mdn_mode');
            $table->string('mdn_subject');
            $table->string('mdn_options');
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
        Schema::dropIfExists('as_partners');
    }
};
