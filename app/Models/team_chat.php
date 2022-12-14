<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team_chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lecture_id',
        'comment',
    ];

    protected $guarded = [
        'id'
    ];
}
