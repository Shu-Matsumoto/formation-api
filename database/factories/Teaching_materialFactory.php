<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\lecture;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\teaching_material>
 */
class teaching_materialFactory extends Factory
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
            'lecture_id' => lecture::factory(),
            'title' => '教材1',
            'explanation' => '教材1の説明',
            'path' => 'https://drive.google.com/file/d/1ONKb2nUf5HQytZqN7OxUdY0-gABh5dJK/view?usp=sharing',
        ];
    }
}
