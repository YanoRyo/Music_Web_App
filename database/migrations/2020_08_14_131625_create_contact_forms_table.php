<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            // 氏名、メールアドレス、希望分野、お気に入りのジャンル、パスワード
            $table->string('user_name', 20);	
            $table->string('email', 100);	
            $table->string('user_field', 10);
            $table->string('favorite_genre', 100);	
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
        Schema::dropIfExists('contact_forms');
    }
}
