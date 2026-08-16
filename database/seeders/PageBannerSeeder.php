<?php

namespace Database\Seeders;

use App\Models\PageBanner;
use Illuminate\Database\Seeder;

class PageBannerSeeder extends Seeder
{
    public function run(): void
    {
        $pageBanners = [
            'home' => [
                'title' => 'I build reliable digital systems.',
                'description' => 'Laravel developer focused on backend architecture, APIs and modern web applications.',
            ],

            'about' => [
                'title' => 'About Me',
                'description' => 'A little about who I am, what I build and how I approach software development.',
            ],

            'services' => [
                'title' => 'What I Do',
                'description' => 'Backend development, API engineering and modern web application development.',
            ],

            'gallery' => [
                'title' => 'Selected Work',
                'description' => 'A collection of projects and systems I have worked on.',
            ],

            'blog' => [
                'title' => 'Articles & Insights',
                'description' => 'Things I learn, build and think about while working with technology.',
            ],

            'contact' => [
                'title' => "Let's Work Together",
                'description' => 'Have an idea or project? I would love to hear about it.',
            ],
        ];

        foreach ($pageBanners as $page => $data) {
            PageBanner::updateOrCreate(
                [
                    'page' => $page,
                    'section' => 'banner',
                ],
                [
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'status' => 'Active',
                ]
            );
        }
    }
}
