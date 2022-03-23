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
        Schema::table('as_messages', function (Blueprint $table) {
            //
            $table->foreign('sender_id')->references('id')->on('as_partners');
            $table->foreign('receiver_id')->references('id')->on('as_partners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('as_messages', function (Blueprint $table) {
            //
        });
    }
};
