<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        $projects = Project::all();
        
        $projects->each(function ( $project ) {

       
            if (Project::count() === 0) {
                
                Project::factory()->count(3)->create();
            }
    
          
            Project::all()->each(function ($project) {
                Task::factory()->count(3)->create([
                    'project_id' => $project->id,
                ]);
            });
        });
    }}
