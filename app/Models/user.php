<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;

    protected $fillable = [
        'login_id',
        'password',
        'user_name',
        'email',
        'image_path',
        'self_introduction',
        'credit_card_number',
        'financial_institution_id',
        'bank_number',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guarded = [
        'id'
    ];
}
