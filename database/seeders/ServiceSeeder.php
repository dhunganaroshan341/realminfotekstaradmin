<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                // 'image' => 'asset/images/web-development.jpg',
                'name' => 'Web Development',
                'short_desc' => 'Building responsive and functional websites.',
                'description' => 'We specialize in creating responsive and functional websites tailored to your business needs, ensuring a strong online presence.',
                'status' => 1,
            ],
            [
                // 'image' => 'asset/images/digital-marketing.jpg',
                'name' => 'Digital Marketing',
                'short_desc' => 'Promoting your brands through digital channels.',
                'description' => 'We offer comprehensive digital marketing services to promote your brand across various digital platforms, increasing reach and engagement.',
                'status' => 1,
            ],
            [
                // 'image' => 'asset/images/seo.jpg',
                'name' => 'SEO',
                'short_desc' => 'Optimizing websites for search engines.',
                'description' => 'Our SEO services enhance your website’s visibility on search engines, driving organic traffic and improving search rankings.',
                'status' => 1,
            ],
            [
                // 'image' => 'asset/images/graphic-design.jpeg',
                'name' => 'Graphic Design',
                'short_desc' => 'Crafting visual content to communicate messages.',
                'description' => 'Our graphic design services involve creating visual content that effectively communicates your brand message and engages your audience.',
                'status' => 1,
            ],
            [
    'name' => 'Email Hosting',
    'short_desc' => 'Professional and secure business email services.',
    'description' => 'Our email hosting service provides reliable, secure, and custom domain-based email solutions for your business communication needs.',
    'status' => 1,
],
[
    'name' => 'Videography',
    'short_desc' => 'Telling your story through high-quality video production.',
    'description' => 'We offer professional videography services that capture, edit, and deliver compelling videos to effectively showcase your brand, products, or events.',
    'status' => 1,
],


        ];

        // Insert only if the services do not already exist
        foreach ($services as $service) {
            if (!DB::table('services')->where('name', $service['name'])->exists()) {
                DB::table('services')->insert($service);
            }
        }
    }
}
