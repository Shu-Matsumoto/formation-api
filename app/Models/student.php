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

    public function lecture()
    {
        return $this->hasOne(\App\Models\lecture::class, 'id', 'lecture_id');
    }

    public function application_of_lecture()
    {
        return $this->hasMany(\App\Models\application_of_lecture::class, 'student_id', 'id');
    }
}
