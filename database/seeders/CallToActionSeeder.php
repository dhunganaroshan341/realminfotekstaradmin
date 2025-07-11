<?php

namespace Database\Seeders;

use App\Models\CallToAction;
use Illuminate\Database\Seeder;

class CallToActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $pages = ['home', 'about', 'contact', 'gallery', 'services', 'blog'];

    public function run(): void
    {
        foreach ($this->pages as $page) {
            CallToAction::updateOrCreate(
                ['page' => $page],
                [
                    'title' => 'Do you need help?',
                    'description' => 'Realm Infotech Nepal is dedicated to providing exceptional IT solutions including web development, digital marketing, and software services. Contact us to elevate your business with innovative technology and expert support.',
                    'image' => 'hero_cta.jpg',
                    'link' => 'contact-us',
                ]
            );
        }
    }
}
