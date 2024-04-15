<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fakeWork = $this->faker->sentence;
        return [
            'work_name' => $fakeWork,
            'work_name_english' => $fakeWork,
            'work_task' => $this->faker->paragraph,
            'study_type' => $this->faker->randomElement(['professional', 'undergraduate', 'graduate']),
        ];
    }
}
