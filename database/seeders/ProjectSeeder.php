<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'description' => 'A full-stack e-commerce platform built with Laravel and React. Features include user authentication, product catalog, shopping cart, payment integration with Stripe, and order management.',
                'tech_stack' => ['Laravel', 'React', 'Tailwind CSS', 'Stripe', 'MySQL'],
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
                'featured' => true,
                'display_order' => 1,
            ],
            [
                'title' => 'Task Management App',
                'description' => 'A collaborative task management application with real-time updates, drag-and-drop kanban boards, team workspaces, and notification system.',
                'tech_stack' => ['Laravel', 'Inertia.js', 'Vue.js', 'Pusher', 'SQLite'],
                'github_url' => 'https://github.com',
                'live_url' => null,
                'featured' => true,
                'display_order' => 2,
            ],
            [
                'title' => 'Portfolio CMS',
                'description' => 'A content management system designed for creatives to showcase their work. Includes customizable themes, image galleries, and contact forms.',
                'tech_stack' => ['Laravel', 'React', 'Inertia.js', 'Tailwind CSS'],
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
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

