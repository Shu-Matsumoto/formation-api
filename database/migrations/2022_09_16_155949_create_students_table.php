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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('lecture_id')->constrained('lectures')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedInteger('position')->comment('参加役割');
            $table->unsignedInteger('status')->comment('受講ステータス');
            $table->unsignedInteger('pay_amount')->comment('支払い金額');
            $table->text('goal')->nullable()->comment('目標到達レベル');
            $table->text('requirement')->nullable()->comment('参加必要条件');
            $table->text('dev_env')->nullable()->comment('必要開発環境');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE " . DB::getTablePrefix() . "students COMMENT '生徒'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
