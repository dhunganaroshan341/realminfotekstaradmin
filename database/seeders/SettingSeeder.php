<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'title' => 'Roshan Dhungana',

                'description' => 'Laravel developer focused on building reliable web applications, REST APIs, and scalable backend systems.',

                'work_description' => 'I am a Laravel developer passionate about backend engineering, clean architecture, APIs, database design, and building practical software systems. I enjoy understanding how systems work and turning complex requirements into maintainable applications.',

                'email' => 'dhunganaroshan341@gmail.com',

                'address' => 'Kathmandu, Nepal',

                'contact' => null,

                'facebook_url' => null,

                'twitter_url' => null,

                'github_url' => 'https://github.com/dhunganaroshan341',

                'instagram_url' => null,
            ]
        );
    }
}
