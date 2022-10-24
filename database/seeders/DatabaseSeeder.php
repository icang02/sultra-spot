<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin',]);
        Role::create(['name' => 'pengunjung',]);
        Role::create(['name' => 'pengelola',]);

        User::factory()->create([
            'name' => 'Administrator',
            'username' => Str::slug('Administrator'),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'Ilmi Faizan',
            'username' => Str::slug('icang1112'),
            'email' => 'ilmifaizan1112@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        User::factory(500)->create();

        User::factory()->create([
            'name' => 'Nur Afdhaliyah',
            'username' => Str::slug('aliyah1112'),
            'email' => 'aliyah@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);
    }
}
