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
            'address' => 'Sumit Thakur ko Address',
            'qualification' => 'Sumit Thakur ko QUalification',
            'experience' => 'Sumit Thakur ko experience',
            'phone' => '112531232',
        ]);

        // Seed Subjects
        $subjects = [
            [
                'code' => 'CSC109',
                'name' => 'Introduction to Information Technology',
            ], [
                'code' => 'CSC110',
                'name' => 'C Programming',
            ], [
                'code' => 'CSC111',
                'name' => 'Digital Logic',
            ], [
                'code' => 'MTH112',
                'name' => 'Mathematics I',
            ], [
                'code' => 'PHY113',
                'name' => 'Physics',
            ], [
                'code' => 'CSC160',
                'name' => 'Discrete Structure',
            ], [
                'code' => 'CSC161',
                'name' => 'Object-Oriented Programming',
            ], [
                'code' => 'CSC162',
                'name' => 'Microprocessor',
            ], [
                'code' => 'MTH163',
                'name' => 'Mathematics II',
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
