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
                'email' => null,
                'address' => null,
                'contact' => null,
                'image' => null,
                'description' => 'Food company with brands including Sujal and Eclat Milk Chocolate',
            ],
            [
                'name' => 'HINWA WINE',
                'email' => null,
                'address' => null,
                'contact' => null,
                'image' => null,
                'description' => 'Wine company producing barberry wine',
            ],
            [
                'name' => 'BROADLINK',
                'email' => null,
                'address' => null,
                'contact' => null,
                'image' => null,
                'description' => 'Internet service provider offering unlimited CDN bandwidth, gaming services, and broadband connectivity',
            ],
            [
                'name' => 'UHS HOLDINGS',
                'email' => null,
                'address' => null,
                'contact' => null,
                'image' => null,
                'description' => 'Brands include Faber, Hafele, Arancia, Evershine, Oyster, London, Gebe, Franke\'s, etc.',
            ],
            [
                'name' => 'CG ELECTRONICS',
                'email' => null,
                'address' => null,
                'contact' => null,
                'image' => null,
                'description' => 'Electronics company with brands like Moog, Beko, Midea, Crompton',
            ],
            [
                'name' => 'AITM COLLEGE',
                'email' => null,
                'address' => 'Lalitpur',
                'contact' => null,
                'image' => null,
                'description' => 'Asian Institute of Technology & Management, established 2012',
            ],
            [
                'name' => 'CG EDUCATION',
                'email' => null,
                'address' => null,
                'contact' => null,
                'image' => null,
                'description' => 'Educational unit of Chaudhary Group managing multiple schools',
            ],
            [
                'name' => 'MODERN NEPAL COLLEGE',
                'email' => null,
                'address' => 'Sorhakhutte, Kathmandu',
                'contact' => null,
                'image' => null,
                'description' => 'TU affiliated college offering BBA, BBS, and MBS programs',
            ],
            [
                'name' => 'NON-RESIDENT NEPALI ASSOCIATION-HLC',
                'email' => null,
                'address' => null,
                'contact' => null,
                'image' => null,
                'description' => 'Organization for Non-Resident Nepalis',
            ],
            [
                'name' => 'KARMA RESIDENCES',
                'email' => null,
                'address' => 'Kathmandu',
                'contact' => null,
                'image' => null,
                'description' => '5-star amenities, earthquake-resistant condos designed by UNA Architects',
            ],
            [
                'name' => 'LE GLAMOUR LUXURY RESORT & WELLNESS SPA',
                'email' => null,
                'address' => 'Methlang, Sarangkot, Pokhara-18, Gandaki Province',
                'contact' => null,
                'image' => null,
                'description' => 'Luxury resort and wellness spa',
            ],
            [
                'name' => 'INNER SIGHT',
                'email' => null,
                'address' => 'Sanepa, Lalitpur',
                'contact' => null,
                'image' => null,
                'description' => 'International club/service provider',
            ],
            [
                'name' => 'LAW LAB NEPAL',
                'email' => null,
                'address' => null,
                'contact' => null,
                'image' => null,
                'description' => 'Law firm offering litigation services, corporate legal services, and policy reform',
            ],
            [
                'name' => 'IPTM NEPAL',
                'email' => null,
                'address' => null,
                'contact' => null,
                'image' => null,
                'description' => 'Institute of Professional Training and Management Nepal',
            ],
            [
                'name' => 'NANGSA ART GALLERY',
                'email' => null,
                'address' => 'Baudha, Kathmandu',
                'contact' => null,
                'image' => null,
                'description' => 'Art gallery offering artwork with worldwide shipping and 20-year warranty',
            ],
            [
                'name' => 'BAGMATI ARTS & HANDICRAFTS',
                'email' => null,
                'address' => null,
                'contact' => null,
                'image' => null,
                'description' => 'Arts and handicrafts company',
            ],
            [
                'name' => 'SAMSARA HOLIDAYS',
                'email' => null,
                'address' => 'Lainchaur, Kathmandu',
                'contact' => null,
                'image' => null,
                'description' => 'Travel agency offering travel deals and tour packages',
            ],
            [
                'name' => 'BISHWOJYOTI MALL CINEPLEX',
                'email' => null,
                'address' => null,
                'contact' => null,
                'image' => null,
                'description' => 'Movie theater/cineplex with ticket discounts',
            ],
            [
                'name' => 'SHAKTI PANEL INDUSTRIES PVT. LTD',
                'email' => null,
                'address' => null,
                'contact' => null,
                'image' => null,
                'description' => 'Industrial company specializing in smart insulation and protection panels',
            ],
            [
                'name' => 'SURYA KIRAN FIBER INDUSTRIES',
                'email' => null,
                'address' => 'Bharatpur-8, Chitwan',
                'contact' => null,
                'image' => null,
                'description' => 'Fiber industries company',
            ],
            [
                'name' => 'HOARDING BOARD NEPAL',
                'email' => null,
                'address' => 'Anamnagar, Kathmandu',
                'contact' => null,
                'image' => null,
                'description' => 'Advertising and marketing company specializing in hoarding boards',
            ],
            [ 'name' => 'AUSTRALIAN NATIONAL INSTITUTE OF EDUCATION', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ],
            [ 'name' => 'CHARUSAT', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ],
            [ 'name' => 'KAILASH GROUP', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => 'Established since 2001, 27 years of excellence' ],
            [ 'name' => 'HIMALAYA KAILASH HELI SERVICES', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => 'Helicopter services company' ],
            [ 'name' => 'ROYAL PENGUIN BOUTIQUE HOTEL', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ],
            [ 'name' => 'TRAVA BRICKS PVT. LTD', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ],
            [ 'name' => 'INVITE KHABAR', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ],
            [ 'name' => 'SMARTHAJIR', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ],
            [ 'name' => 'IBZ TRAVELS AND TOURS PVT. LTD', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ],
            [ 'name' => 'IBZ INTERNATIONAL EDUCATION CONSULTANCY', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ],
            [ 'name' => 'HANEUL', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ],
            [ 'name' => 'INDO ARAB MANPOWER PVT. LTD', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ],
            [ 'name' => 'NASSER INTERNATIONAL PLACEMENT SERVICES', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ],
            [ 'name' => 'AURORA HUMAN RESOURCE PVT. LTD', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ],
            [ 'name' => 'OSA CONSULTANCY OVERSEAS EDUCATIONAL CENTER', 'email' => null, 'address' => null, 'contact' => null, 'image' => null, 'description' => null ]
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(['name' => $client['name']], $client);

        }
    }
}
