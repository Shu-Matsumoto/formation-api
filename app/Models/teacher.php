<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lecture_id',
        'type',
        'pay_amount',
    ];

    protected $guarded = [
        'id'
    ];

    // 講義テーブルの関連付け
    public function lecture()
    {
        return $this->hasOne(\App\Models\lecture::class, 'id', 'lecture_id');
    }

    // 生徒テーブルの関連付け
    public function students()
    {
        return $this->hasMany(\App\Models\application_of_lecture::class, 'student_id', 'id');
    }
}
