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
        'full_name' => 'Kusal Pokhrel',
        'email' => 'kusal@gmail.com',
        'position' => 'CEO',
        'order' => 1,
    ],
    [
        'full_name' => 'Biplov Chhetri',
        'email' => 'biplov@gmail.com',
        'position' => 'Managing Director',
        'order' => 2,
    ],
    [
        'full_name' => 'Er. Samundra Shrestha',
        'email' => 'samundra@gmail.com',
        'position' => 'CTO/Sr. Web Consultant',
        'order' => 3,
    ],
    [
        'full_name' => 'Suman Chaudhary',
        'email' => 'suman@gmail.com',
        'position' => 'SEO & Social Media Handler',
        'order' => 4,
    ],
    [
        'full_name' => 'Subash Dawadi',
        'email' => 'subash@gmail.com',
        'position' => 'DevOps Engineer',
        'order' => 5,
    ],
    [
        'full_name' => 'Roshan Dhungana',
        'email' => 'roshan@gmail.com',
        'position' => 'Web Developer',
        'order' => 12,
    ],
    [
        'full_name' => 'Angeela Shrestha',
        'email' => 'angeela@gmail.com',
        'position' => 'Graphic Designer',
        'order' => 7,
    ],
   [
    'full_name' => 'Er. Samundra Shrestha',
    'email' => 'samundra@gmail.com',
    'position' => 'CTO/Sr. Web Consultant',
    'order' => 10,
],
[
    'full_name' => 'Ruben Magar',
    'email' => 'ruben@gmail.com',
    'position' => 'Graphic Designer',
    'order' => 11,
],
[
    'full_name' => 'Saroj Dhungana',
    'email' => 'saroj@gmail.com',
    'position' => 'Project Lead (Web)',
    'order' => 9,
],
[
    'full_name' => 'Sabin Karki',
    'email' => 'sabin@gmail.com',
    'position' => 'Motion Graphic Designer',
    'order' => 13,
],
[
    'full_name' => 'Arjun Saud',
    'email' => 'arjun@gmail.com',
    'position' => 'Web Designer',
    'order' => 14,
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
