<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Module::truncate();

        
        Module::create([
            'name' => 'HTML/CSS',
            'formation_id' => '1'
        ]);
        Module::create([
            'name' => 'JavaScript',
            'formation_id' => '1'
        ]);
        Module::create([
            'name' => 'Base de Donnée',
            'formation_id' => '1'
        ]);
        Module::create([
            'name' => 'Word',
            'formation_id' => '2'
        ]);
        Module::create([
            'name' => 'Excel',
            'formation_id' => '2'
        ]);
        Module::create([
            'name' => 'PowerPoint',
            'formation_id' => '2'
        ]);
        Module::create([
            'name' => 'Publisher',
            'formation_id' => '2'
        ]);
        Module::create([
            'name' => 'PhotoShop',
            'formation_id' => '3'
        ]);
        Module::create([
            'name' => 'Adobe PhotoShop',
            'formation_id' => '3'
        ]);
        Module::create([
            'name' => 'Figma',
            'formation_id' => '3'
        ]);
        Module::create([
            'name' => 'PhotoShop',
            'formation_id' => '4'
        ]);
        Module::create([
            'name' => 'Ai',
            'formation_id' => '4'
        ]);
        Module::create([
            'name' => 'Connaissances des réseaux sociaux',
            'formation_id' => '5'
        ]);
        Module::create([
            'name' => 'Comprendre Facebook, Instagram, Linkedin',
            'formation_id' => '5'
        ]);
        Module::create([
            'name' => 'Utiliser des objets',
            'formation_id' => '6'
        ]);
        Module::create([
            'name' => 'Heritage',
            'formation_id' => '6'
        ]);
        Module::create([
            'name' => 'Maintenir le code',
            'formation_id' => '6'
        ]);
    }
}
