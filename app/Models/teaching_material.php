<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teaching_material extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lecture_id',
        'title',
        'explanation',
        'path',
    ];

    protected $guarded = [
        'id'
    ];
}
