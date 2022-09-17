<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lecture_schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecture_id',
        'start_time',
        'end_time',
        'url',
        'meeting_id',
        'passcord',
    ];

    protected $guarded = [
        'id'
    ];
}
