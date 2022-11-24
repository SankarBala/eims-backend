<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'name' => 'Dhaka International School',
            'slug' => 'dhaka-international-school',
            'code' => 'dis',
            'address' => 'Dhaka City, Dhaka-1000, Bangladesh',
            'phone' => '["01742725606", "01531827045"]',
            'email' => 'dhaka@ins.com',
        ]);
        Branch::create([
            'name' => 'Barisal International School',
            'slug' => 'barisal-international-school',
            'code' => 'bis',
            'address' => 'Barisal',
            'phone' => '["01742725606", "01531827045"]',
            'email' => 'barisal@ins.com',
        ]);
        Branch::create([
            'name' => 'Khulna International School',
            'slug' => 'khulna-international-school',
            'code' => 'kis',
            'address' => 'Khulna',
            'phone' => '["01742725606", "01531827045"]',
            'email' => 'khulna@ins.com',
        ]);
        Branch::create([
            'name' => 'Chittagoan International School',
            'slug' => 'chittagoan-international-school',
            'code' => 'cis',
            'address' => 'Chittagaon',
            'phone' => '["01742725606", "01531827045"]',
            'email' => 'chittagaon@ins.com',
        ]);
    }
}
