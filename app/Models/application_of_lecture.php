<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application_of_lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_id',
        'status',
        'motivation',
    ];

    protected $guarded = [
        'id'
    ];

    // ユーザーテーブルの関連付け
    public function user()
    {
        return $this->hasOne(\App\Models\user::class, 'id', 'user_id');
    }
    // 生徒テーブルの関連付け
    public function student()
    {
        return $this->hasOne(\App\Models\student::class, 'id', 'student_id');
    }
    // 講義テーブルの関連付け
    public function lecture()
    {
        return $this->student->hasOne(\App\Models\lecture::class, 'id', 'lecture_id');
    }
}
