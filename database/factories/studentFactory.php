<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\lecture;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class studentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'user_id' => 0,
            'lecture_id' => lecture::factory(),
            'position' => 1,
            'status' => 1,
            'pay_amount' => 10000,
            'goal' => 'リーダーのゴール',
            'requirement' => '5人以上チームのリーダー経験があること',
            'dev_env' => 'Mac M1ではないMac',
        ];
    }
}
