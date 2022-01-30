<?php

namespace Database\Seeders;

use App\Models\Question;
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
        $admin = User::create([
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

        $teacher = $user->teacher()->create([
            'address' => 'Kathmandu',
            'qualification' => 'Master degree',
            'experience' => '2 years',
            'phone' => '9800798151',
        ]);

        // Seed Subjects
        $subjects = [
            [
                'code' => 'csc-1009',
                'name' => 'Introduction to Information Technology',
            ], [
                'code' => 'csc-1010',
                'name' => 'C Programming',
            ], [
                'code' => 'csc-1011',
                'name' => 'Digital Logic',
            ], [
                'code' => 'mth-1012',
                'name' => 'Mathematics I',
            ], [
                'code' => 'phy-1013',
                'name' => 'Physics',
            ], [
                'code' => 'csc-1014',
                'name' => 'Discrete Structure',
            ], [
                'code' => 'csc-1015',
                'name' => 'Object-Oriented Programming',
            ], [
                'code' => 'csc-1016',
                'name' => 'Microprocessor',
            ], [
                'code' => 'mth-1063',
                'name' => 'Mathematics II',
            ], [
                'code' => 'sta-1064',
                'name' => 'Statistics I',
            ], [
                'code' => 'STA164',
                'name' => 'Statistics I',
            ],

        ];

        foreach ($subjects as $subject) {
            $item = new Subject();
            $item->name = $subject['name'];
            $item->code = $subject['code'];
            $item->teacher_id = $teacher->id;
            $item->save();
        }

        $subjects = Subject::all();
        foreach ($subjects as $subject) {
            Topic::factory(15)->create([
                'subject_id' => $subject->id,
            ])->each(function ($topic) use($user) {
                Question::factory(15)->create([
                    'topic_id' => $topic->id,
                    'user_id' => $user->id
                ]);
            });
        }
    }
}
