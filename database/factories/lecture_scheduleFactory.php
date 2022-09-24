<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\lecture;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\lecture_schedule>
 */
class lecture_scheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lecture_id' => lecture::factory(),
            'start_time' => '2022-12-25 21:00:00',
            'end_time' => '2022-12-25 23:00:00',
            'url' => 'https://us05web.zoom.us/j/85098903387?pwd=NFZ3cVgyMHpMd1c1QlZRMTZPdUVTdz09',
            'meeting_id' => '850 9890 3387',
            'passcord' => 'naFWW7'
        ];
    }
}
