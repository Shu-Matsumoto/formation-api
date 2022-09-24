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
        Schema::create('user_notices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedInteger('type')->nullable()->comment('通知タイプ');
            $table->unsignedInteger('already_read')->nullable()->comment('既読');
            $table->text('title')->nullable()->comment('タイトル');
            $table->text('sub_title')->nullable()->comment('サブタイトル');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE " . DB::getTablePrefix() . "user_notices COMMENT 'ユーザー通知'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_notices');
    }
};
