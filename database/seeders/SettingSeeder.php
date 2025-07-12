<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting=new Setting();
        $setting->title="Realm Infotech";
        $setting->description=fake()->paragraph();
        $setting->work_description=fake()->paragraph();
        $setting->email=" info@realminfotek.com";
        $setting->address="Patan Dhoka";
        $setting->contact=" +977 01-5529237 ";
        $setting->contact_2="9851056649";
        $setting->facebook_url="https://www.facebook.com/realminfotek";
        $setting->twitter_url="https://realminfotek.com/#";
        $setting->github_url="https://github.com";
        $setting->instagram_url="https://www.instagram.com/realm_infotek/";
        $setting->save();
    }
}
