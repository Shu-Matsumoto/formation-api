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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login_id', 100)->unique()->collate('utf8mb4_general_ci')->comment('ログインID');
            $table->string('password')->comment('パスワード');
            $table->string('user_name', 100)->comment('ユーザー名');
            $table->string('email', 100)->unique()->collate('utf8mb4_general_ci')->comment('メールアドレス');
            $table->string('image_path', 200)->nullable()->comment('画像パス');
            $table->text('self_introduction')->nullable()->comment('自己紹介文');
            $table->unsignedInteger('credit_card_number')->nullable()->comment('クレジットカード番号');
            $table->unsignedInteger('financial_institution_id')->nullable()->comment('金融機関番号');
            $table->unsignedInteger('bank_number')->nullable()->comment('入金用銀行口座番号');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE " . DB::getTablePrefix() . "users COMMENT 'ユーザー'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
