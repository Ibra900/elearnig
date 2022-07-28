<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Lecon;
use App\Models\Module;
use App\Models\Chapitre;
use App\Models\Formation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);

            Role::truncate();

            Role::create(['name' => 'admin']);
            Role::create(['name' => 'apprenant']);

        User::truncate();
        DB::table('role_user')->truncate();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $apprenant1 = User::create([
            'name' => 'apprenant1',
            'email' => 'apprenant1@gmail.com',
            'password' => Hash::make('password')
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        $apprenant1Role = Role::where('name', 'apprenant')->first();

        $admin->roles()->attach($adminRole);
        $apprenant1->roles()->attach($apprenant1Role);


        \App\Models\Formation::factory(10)->create();
        \App\Models\Module::factory(15)->create();
        \App\Models\Chapitre::factory(20)->create();
        \App\Models\Lecon::factory(30)->create();
    }
}
