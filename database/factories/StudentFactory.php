<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Subject::class;

    public function definition()
    {
        return [
            'student_id' => Student::factory()->create()->id,
            'subject_code' => $this->faker->unique()->regexify('[A-Z]{3}-\d{3}'),
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'instructor' => $this->faker->name,
            'schedule' => $this->faker->randomElement(['MW 7AM-12PM', 'TTh 1PM-6PM', 'WF 8AM-1PM']),
            'grades' => [
                'prelims' => $this->faker->randomFloat(2, 1, 5),
                'midterms' => $this->faker->randomFloat(2, 1, 5),
                'pre_finals' => $this->faker->randomFloat(2, 1, 5),
                'finals' => $this->faker->randomFloat(2, 1, 5),
            ],
            'average_grade' => $this->faker->randomFloat(2, 1, 5),
            'remarks' => $this->faker->randomElement(['PASSED', 'FAILED']),
            'date_taken' => $this->faker->date(),
        ];
    }
}
