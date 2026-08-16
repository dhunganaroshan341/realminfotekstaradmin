<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Multi-Branch Restaurant Platform',
                'slug' => 'multi-branch-restaurant-platform',
                'short_description' => 'A multi-branch restaurant platform for customer ordering, reservations, staff operations and payments.',
                'description' => 'A restaurant management platform currently under development. The system is designed around multiple branches and includes customer ordering, restaurant reservations, staff operations, loyalty features, notifications and payment integrations.',
                'role' => 'Backend Developer',
                'github_url' => null,
                'project_url' => null,
                'image' => null,
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],

            [
                'title' => 'Mobility Tracking Platform',
                'slug' => 'mobility-tracking-platform',
                'short_description' => 'A mobility and employee tracking platform for monitoring movement, attendance and operational activity.',
                'description' => 'A backend system supporting employee movement tracking, attendance, location updates, status management and administrative operations. The platform integrates with mobile and administrative applications.',
                'role' => 'Backend Developer',
                'github_url' => null,
                'project_url' => null,
                'image' => null,
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],

            [
                'title' => 'Mall Management CMS',
                'slug' => 'mall-management-cms',
                'short_description' => 'A content and rental management CMS for a mall with theatres, rental spaces and other facilities.',
                'description' => 'A CMS developed for managing mall-related information, theatres, rental spaces and facility requests. I worked on CRUD operations and backend functionality for managing rental spaces and handling requests.',
                'role' => 'Laravel Developer',
                'github_url' => null,
                'project_url' => null,
                'image' => null,
                'is_featured' => false,
                'is_active' => true,
                'order' => 3,
            ],

            [
                'title' => 'Hotel Management CMS',
                'slug' => 'hotel-management-cms',
                'short_description' => 'A CMS for managing hotel information, content and operational details.',
                'description' => 'A hotel-focused CMS providing administrators with tools to manage hotel information, details, content and related records through a centralized administration system.',
                'role' => 'Laravel Developer',
                'github_url' => null,
                'project_url' => null,
                'image' => null,
                'is_featured' => false,
                'is_active' => true,
                'order' => 4,
            ],

            [
                'title' => 'College Management CMS',
                'slug' => 'college-management-cms',
                'short_description' => 'A CMS for managing college information, academic content and institutional details.',
                'description' => 'A content management system designed for colleges to manage institutional information, academic content and other website data through an administrative interface.',
                'role' => 'Laravel Developer',
                'github_url' => null,
                'project_url' => null,
                'image' => null,
                'is_featured' => false,
                'is_active' => true,
                'order' => 5,
            ],

            [
                'title' => 'Travel & Trekking CMS',
                'slug' => 'travel-and-trekking-cms',
                'short_description' => 'A CMS for travel and trekking organizers to manage destinations, packages and website content.',
                'description' => 'A travel and trekking management CMS built for organizers to manage travel-related content, destinations, trekking packages and other website information through an administrative panel.',
                'role' => 'Laravel Developer',
                'github_url' => null,
                'project_url' => null,
                'image' => null,
                'is_featured' => false,
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }
    }
}
