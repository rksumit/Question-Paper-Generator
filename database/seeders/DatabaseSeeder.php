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
        $user = User::create([
            'name' => 'Sumit Thakur',
            'email' => 'thakur@sumit.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
        ]);

        $user->teacher()->create([
            'address' => 'Sumit Thakur ko Address',
            'qualification' => 'Sumit Thakur ko QUalification',
            'experience' => 'Sumit Thakur ko experience',
            'phone' => '112531232',
        ]);
    }
}
