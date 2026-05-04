<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     *
     */
    public function run(): void
    {
$projects = [
            [
                'title' => 'PAC E-library',
                'description' => 'Philippine Advent College e-library is a Laravel 12-based digital library system for educational institutions.',
                'tech_stack' => ['Laravel 12', 'MySQL', 'Blade'],
                'github_url' => 'https://github.com/example/pac-elibrary',
                'live_url' => 'https://pacelib.online/',
                'featured' => true,
                'display_order' => 1,
            ],
            [
                'title' => 'Fitness Gain$',
                'description' => 'A web-based system that simplifies gym management and operations. It also includes AI chatbot.',
                'tech_stack' => ['Laravel', 'React', 'Tailwind', 'AI Chatbot'],
                'github_url' => 'https://github.com/example/fitness-gains',
                'live_url' => 'https://fitnessgains.site/',
                'featured' => true,
                'display_order' => 2,
            ],
            [
                'title' => 'Monco',
                'description' => 'An online local clothing store.',
                'tech_stack' => ['Laravel', 'Inertia.js', 'Tailwind CSS'],
                'github_url' => 'https://github.com/example/monco-store',
                'live_url' => 'https://monco.example.com',
                'featured' => true,
                'display_order' => 3,
            ],
            [
                'title' => 'API Gateway Service',
                'description' => 'A microservice API gateway handling authentication, rate limiting, and request routing for a distributed system architecture.',
                'tech_stack' => ['Laravel', 'Redis', 'Docker', 'Nginx'],
                'github_url' => 'https://github.com',
                'live_url' => null,
                'featured' => false,
                'display_order' => 4,
            ],
            [
                'title' => 'Blog Platform',
                'description' => 'A modern blogging platform with markdown support, SEO optimization, comment system, and newsletter subscription.',
                'tech_stack' => ['Laravel', 'React', 'Markdown', 'PostgreSQL'],
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
                'featured' => false,
                'display_order' => 5,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}

