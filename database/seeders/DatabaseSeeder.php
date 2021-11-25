<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Topic;
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
        $user = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ];

        User::create($user);
        User::factory(10)->create()->each(function ($user) {
            Teacher::factory(1)->create([
                'user_id' => $user->id
            ])->each(function ($teacher) {
                Subject::factory(1)->create([
                    'teacher_id' => $teacher->id
                ])->each(function ($subject) {
                    Topic::factory(rand(5, 12))->create([
                        'subject_id' => $subject->id
                    ]);
                });
            });
        });

        // $teacher = Teacher::
    }
}
