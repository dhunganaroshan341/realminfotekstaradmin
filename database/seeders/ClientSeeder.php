<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $clients = [
            [
                'name' => 'SUJAL FOODS PVT. LTD.',
                'email' => 'info@sujal.com',
                'address' => 'not_available',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Food company with brands including Sujal and Eclat Milk Chocolate',
            ],
            [
                'name' => 'HINWA WINE',
                'email' => 'info@hinwa.com',
                'address' => 'not_available',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Wine company producing barberry wine',
            ],
            [
                'name' => 'BROADLINK',
                'email' => 'info@broadlink.com',
                'address' => 'not_available',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Internet service provider offering unlimited CDN bandwidth, gaming services, and broadband connectivity',
            ],
            [
                'name' => 'UHS HOLDINGS',
                'email' => 'info@uhs.com',
                'address' => 'not_available',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Brands include Faber, Hafele, Arancia, Evershine, Oyster, London, Gebe, Franke\'s, etc.',
            ],
            [
                'name' => 'CG ELECTRONICS',
                'email' => 'info@cg.com',
                'address' => 'not_available',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Electronics company with brands like Moog, Beko, Midea, Crompton',
            ],
            [
                'name' => 'AITM COLLEGE',
                'email' => 'info@aitm.com',
                'address' => 'Lalitpur',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Asian Institute of Technology & Management, established 2012',
            ],
            [
                'name' => 'CG EDUCATION',
                'email' => 'info@cg.com',
                'address' => 'not_available',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Educational unit of Chaudhary Group managing multiple schools',
            ],
            [
                'name' => 'MODERN NEPAL COLLEGE',
                'email' => 'info@modern.com',
                'address' => 'Sorhakhutte, Kathmandu',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'TU affiliated college offering BBA, BBS, and MBS programs',
            ],
            [
                'name' => 'NON-RESIDENT NEPALI ASSOCIATION-HLC',
                'email' => 'info@nonresident.com',
                'address' => 'not_available',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Organization for Non-Resident Nepalis',
            ],
            [
                'name' => 'KARMA RESIDENCES',
                'email' => 'info@karma.com',
                'address' => 'Kathmandu',
                'contact' => '1234567890',
                'image' => null,
                'description' => '5-star amenities, earthquake-resistant condos designed by UNA Architects',
            ],
            [
                'name' => 'LE GLAMOUR LUXURY RESORT & WELLNESS SPA',
                'email' => 'info@le.com',
                'address' => 'Methlang, Sarangkot, Pokhara-18, Gandaki Province',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Luxury resort and wellness spa',
            ],
            [
                'name' => 'INNER SIGHT',
                'email' => 'info@inner.com',
                'address' => 'Sanepa, Lalitpur',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'International club/service provider',
            ],
            [
                'name' => 'LAW LAB NEPAL',
                'email' => 'info@law.com',
                'address' => 'not_available',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Law firm offering litigation services, corporate legal services, and policy reform',
            ],
            [
                'name' => 'IPTM NEPAL',
                'email' => 'info@iptm.com',
                'address' => 'not_available',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Institute of Professional Training and Management Nepal',
            ],
            [
                'name' => 'NANGSA ART GALLERY',
                'email' => 'info@nangsa.com',
                'address' => 'Baudha, Kathmandu',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Art gallery offering artwork with worldwide shipping and 20-year warranty',
            ],
            [
                'name' => 'BAGMATI ARTS & HANDICRAFTS',
                'email' => 'info@bagmati.com',
                'address' => 'not_available',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Arts and handicrafts company',
            ],
            [
                'name' => 'SAMSARA HOLIDAYS',
                'email' => 'info@samsara.com',
                'address' => 'Lainchaur, Kathmandu',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Travel agency offering travel deals and tour packages',
            ],
            [
                'name' => 'BISHWOJYOTI MALL CINEPLEX',
                'email' => 'info@bishwojyoti.com',
                'address' => 'not_available',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Movie theater/cineplex with ticket discounts',
            ],
            [
                'name' => 'SHAKTI PANEL INDUSTRIES PVT. LTD',
                'email' => 'info@shakti.com',
                'address' => 'not_available',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Industrial company specializing in smart insulation and protection panels',
            ],
            [
                'name' => 'SURYA KIRAN FIBER INDUSTRIES',
                'email' => 'info@surya.com',
                'address' => 'Bharatpur-8, Chitwan',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Fiber industries company',
            ],
            [
                'name' => 'HOARDING BOARD NEPAL',
                'email' => 'info@hoarding.com',
                'address' => 'Anamnagar, Kathmandu',
                'contact' => '1234567890',
                'image' => null,
                'description' => 'Advertising and marketing company specializing in hoarding boards',
            ],

        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(['name' => $client['name']], $client);

        }
    }
}
