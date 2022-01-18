<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Model;
use Carbon\Carbon;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public $department = ['Computer Science', 'Mathematics', 'Biology', 'Chemistry', 'Statistics'];
    public function definition()
    {
        return [
            'user_id' => 1,
            'course' => $this->department[array_rand($this->department)],
            'date' => Carbon::now()->subYears(random_int(1, 3))->subDays(random_int(1, 10))->format('Y-m-d'),
            'start' => Carbon::now()->subDays(random_int(1, 10))->format('H-i-s'),
            'end' => Carbon::now()->subDays(random_int(1, 10))->format('H-i-s'),
        ];
    }
}
