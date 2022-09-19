<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lecture extends Model
{
    use HasFactory;

    protected $table = 'lectures';

    protected $fillable = [
        'user_id',
        'title',
        'explanation',
    ];

    protected $guarded = [
        'id'
    ];
    // 講義に紐づく生徒一覧取得
    public function students()
    {
        return $this->hasMany(\App\Models\student::class, 'lecture_id', 'id');
    }
    // 講義に紐づく講師一覧取得
    public function teachers()
    {
        return $this->hasMany(\App\Models\teacher::class, 'lecture_id', 'id');
    }
    // 講義に紐づくスケジュール一覧取得
    public function lecture_schedules()
    {
        return $this->hasMany(\App\Models\lecture_schedule::class, 'lecture_id', 'id');
    }
    // 講義に紐づく教材一覧取得
    public function teaching_materials()
    {
        return $this->hasMany(\App\Models\teaching_material::class, 'lecture_id', 'id');
    }

    // 講義に紐づくチャット一覧取得
    public function team_chats()
    {
        return $this->hasMany(\App\Models\team_chat::class, 'lecture_id', 'id');
    }
}
