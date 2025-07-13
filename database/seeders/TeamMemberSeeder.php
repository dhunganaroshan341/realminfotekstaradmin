<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'full_name' => $user['full_name'],
                    'password' => bcrypt('admin@123#'), // strong password matching validation
                    'image' => 'https://via.placeholder.com/150',
                    'role' => 'User',
                    'position' => $user['position'],
                    'email_link' => $user['email'],
                    'facebook_link' => 'https://facebook.com/' . Str::slug($user['full_name']),
                    'instagram_link' => 'https://instagram.com/' . Str::slug($user['full_name']),
                    'twitter_link' => 'https://twitter.com/' . Str::slug($user['full_name']),
                    'phonenumber' => '98' . rand(1000000, 9999999),
                    'notes' => fake()->paragraph(),
                    'google_id' => fake()->uuid(),
                    'order' => $user['order'],
                ]
            );
        }
    }
}
