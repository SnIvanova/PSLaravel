<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $languages = ['Javascript/Node', 'Laravel/Blade'];
        $frameworks = ['React', 'Vue', 'Bootstrap'];
        $databases = ['MySQL', 'PostgreSQL'];
        $allTechnologies = array_merge($languages, $frameworks, $databases);
        return [
            'name' => fake()->company(),
            'description' => fake()->text(200),
            'language' => fake()->randomElement($allTechnologies),
            'user_id' => User::get()->random()->id,
        ];
    }
}





