<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'is_admin' => 1,
        ]);
        User::create([
            'name' => 'Dhiru DADA',
            'email' => 'dhiru@dada.com',
            'password' => Hash::make('password'),
            'is_admin' => 1,
        ]);
        Teacher::create([
            'name' => 'Dhiru DADA',
            'address' => 'Dhiru DADA ko Address',
            'qualification' => 'Dhiru DADA ko QUalification',
            'experience' => 'Dhiru DADA ko experience',
            'phone' => 112531232,
            'user_id' => 2,
        ]);
    }
}
