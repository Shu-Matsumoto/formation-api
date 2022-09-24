<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lecture_id',
        'position',
        'status',
        'pay_amount',
        'goal',
        'requirement',
        'dev_env',
    ];

    protected $guarded = [
        'id'
    ];
    // 生徒に紐づくユーザー情報取得
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    // 講義テーブルの関連付け
    public function lecture()
    {
        return $this->hasOne(\App\Models\lecture::class, 'id', 'lecture_id');
    }

    // 受講申請テーブルの関連付け
    public function application_of_lectures()
    {
        return $this->hasMany(\App\Models\application_of_lecture::class, 'student_id', 'id');
    }
}
