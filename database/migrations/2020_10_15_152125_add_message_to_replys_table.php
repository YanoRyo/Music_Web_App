<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessageToReplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('replys', function (Blueprint $table) {
            //
            $table->bigInteger('recieve_id')->comment('送信者')->after('recieve_name');
            $table->bigInteger('send_id')->comment('受信者')->after('recieve_id');
            $table->text('message')->comment('メッセージ')->after('send_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('replys', function (Blueprint $table) {
            //
        });
    }
}
