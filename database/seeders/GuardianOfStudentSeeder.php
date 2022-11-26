<?php

namespace Database\Seeders;

use App\Models\Guardian;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuardianOfStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();
        $guardians = Guardian::count();

        foreach ($students as $student) {
            $student->guardians()->attach(rand(1, $guardians));
        }
    }
}
