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
        Schema::create('as_messages', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('direction')->nullable();
            $table->string('sender_id');
            $table->string('receiver_id');
            $table->text('headers')->nullable();
            $table->text('payload')->nullable();
            $table->string('status')->nullable();
            $table->text('status_msg')->nullable();
            $table->string('mdn_mode')->nullable();
            $table->string('mdn_status')->nullable();
            $table->text('mdn')->nullable();
            $table->string('mic')->nullable();
            $table->boolean('signed')->nullable();
            $table->boolean('encrypted')->nullable();
            $table->boolean('compressed')->nullable();
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
        Schema::dropIfExists('as_messages');
    }
};
