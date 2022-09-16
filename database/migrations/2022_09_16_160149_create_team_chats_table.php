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
        Schema::create('team_chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('lecture_id')->constrained('lectures')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('comment')->comment('コメント');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE " . DB::getTablePrefix() . "team_chats COMMENT 'チーム内チャット'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_chats');
    }
};
