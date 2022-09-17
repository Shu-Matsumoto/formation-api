<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application_of_lecture extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->hasOne(\App\Models\student::class, 'id', 'student_id');
    }
}
