<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\application_of_lecture>
 */
class application_of_lectureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'student_id' => student::factory(),
            'status' => 1,
            'motivation' => 'よろしくおねがいします。',
            'fb_comment' => '',
        ];
    }
}
