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
        Schema::create('lecture_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lecture_id')->constrained('lectures')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamp('start_time')->comment('開始時刻');
            $table->timestamp('end_time')->comment('終了時刻');
            $table->text('url')->comment('MTG URL');
            $table->string('meeting_id', 100)->nullable()->comment('ミーティングID');
            $table->string('passcord', 100)->nullable()->comment('パスコード');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE " . DB::getTablePrefix() . "lecture_schedules COMMENT '講義日程'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecture_schedules');
    }
};
