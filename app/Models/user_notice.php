<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'already_read',
        'title',
        'sub_title'
    ];

    protected $guarded = [
        'id'
    ];
}
