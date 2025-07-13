<?php
// database/seeders/UserSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create default admin
        $users = [
    [
        'full_name' => 'Kushal Pokhrel',
        'email' => 'kushal@gmail.com',
        'position' => 'Co-Founder / CEO',
        'order' => 3,
    ],
    [
        'full_name' => 'Biplov Adhikari',
        'email' => 'biplov@gmail.com',
        'position' => 'Co-Founder',
        'order' => 4,
    ],
    [
        'full_name' => 'Subash Duwadi',
        'email' => 'subash@gmail.com',
        'position' => 'DevOps Engineer',
        'order' => 5,
    ],
    [
        'full_name' => 'Kundan Pokhrel',
        'email' => 'kundan@gmail.com',
        'position' => 'Backend Engineer',
        'order' => 6,
    ],
    [
        'full_name' => 'Suman Chaudhary',
        'email' => 'suman@gmail.com',
        'position' => 'SEO Engineer',
        'order' => 7,
    ],
    [
        'full_name' => 'Anjeela Shrestha',
        'email' => 'anjeela@gmail.com',
        'position' => 'Senior Graphic Designer',
        'order' => 8,
    ],
    [
        'full_name' => 'Roshan Dhungana',
        'email' => 'roshan@gmail.com',
        'position' => 'Laravel Developer',
        'order' => 9,
    ],
];
        User::updateOrCreate(
            ['email' => 'adminstar@gmail.com'],
            [
                'full_name' => 'Roshan Dhungana',
                'password' => bcrypt('admin@123#'),
                'image' => 'https://via.placeholder.com/150',
                'role' => 'Admin',
                'position' => 'Programmer',
                'email_link' => 'adminstar@gmail.com',
                'facebook_link' => 'https://facebook.com/roshan',
                'instagram_link' => 'https://instagram.com/roshan',
                'twitter_link' => 'https://twitter.com/roshan',
                'phonenumber' => '9823681753',
                'notes' => fake()->paragraph(),
                'google_id' => fake()->uuid(),
            ]
        );
        foreach ($users as $user) {
    User::updateOrCreate(
        ['email' => $user['email']],
        [
            'full_name' => $user['full_name'],
            'password' => bcrypt('admin@123#'), // strong password fulfilling rules
            'image' => 'https://via.placeholder.com/150', // placeholder URL
            'role' => 'Staff', // non-admin role for team members
            'position' => $user['position'],
            'email_link' => $user['email'],
            'facebook_link' => 'https://facebook.com/' . Str::slug($user['full_name']),
            'instagram_link' => 'https://instagram.com/' . Str::slug($user['full_name']),
            'twitter_link' => 'https://twitter.com/' . Str::slug($user['full_name']),
            'phonenumber' => '98' . rand(1000000, 9999999), // 9-digit number starting with 98 (7+ digits total)
            'notes' => fake()->paragraph(),
            'google_id' => fake()->uuid(),
            'order' => $user['order'],
        ]
    );
}

        // Create 100 users using factory
        // User::factory()->count(80)->create();
    }
}
