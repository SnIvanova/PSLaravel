<?php

namespace Database\Seeders;

use App\Models\Progect;
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
        $progects = Progect::all();

        
        $progects->each(function ($progect) {
           
            Task::factory()->count(3)->create([
                'progect_id' => $progect->id,
            ]);
        });
    }
}
