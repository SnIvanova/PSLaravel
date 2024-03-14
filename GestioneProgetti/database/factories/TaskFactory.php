<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /* $taskName = Task::pluck('name')->random(); */
        return [
            'name' => fake()->text(),
            'user_id' => User::get()->random()->id,
            'project_id' => Project::get()->random()->id
        ];
    }
}
