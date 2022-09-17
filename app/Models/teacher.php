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
}
