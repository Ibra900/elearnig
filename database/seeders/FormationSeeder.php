<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Formation::truncate();

        
        Formation::create([
            'name' => 'WebMaster',
            'prix' => '$450'
        ]);
        Formation::create([
            'name' => 'Bureautique',
            'prix' => '$200'
        ]);
        Formation::create([
            'name' => 'Web Design',
            'prix' => '$450'
        ]);
        Formation::create([
            'name' => 'Design',
            'prix' => '$400'
        ]);
        Formation::create([
            'name' => 'Marketing Digital',
            'prix' => '$300'
        ]);
        Formation::create([
            'name' => 'PHP',
            'prix' => '$250'
        ]);
    }
}
