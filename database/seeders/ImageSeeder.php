<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::truncate();


        Image::create([
            'path' => 'webmaster',
            'formation_id' => '1'
        ]);
        Image::create([
            'path' => '',
            'formation_id' => '2'
        ]);
        Image::create([
            'path' => '',
            'formation_id' => '3'
        ]);
        Image::create([
            'path' => '',
            'formation_id' => '4'
        ]);
        Image::create([
            'path' => '',
            'formation_id' => '5'
        ]);
        Image::create([
            'path' => '',
            'formation_id' => '6'
        ]);
    }
}
