<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class GitHubService
{
    public static function getFeaturedRepos(string $username = 'willie09', int $limit = 6): array
    {
        $projects = [
            [
                'id' => 1,
                'title' => 'PAC E-library',
                'description' => 'Philippine Advent College e-library is a Laravel 12-based digital library system for educational institutions.',
                'tech_stack' => ['Laravel', 'MySQL', 'Blade', 'Tailwind'],
                'github_url' => 'https://github.com/example/pac-elibrary',
                'live_url' => 'https://pacelib.online/',
                'image' => 'images/3.png',
                'featured' => true,
                'display_order' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Fitness Gain$',
                'description' => 'A web-based system that simplifies gym management and operations. It also includes AI chatbot.',
                'tech_stack' => ['Laravel', 'MySQL', 'Blade', 'Tailwind', 'AI Chatbot'],
                'github_url' => 'https://github.com/example/fitness-gains',
                'live_url' => 'https://fitnessgains.site/',
                'image' => 'images/1.png',
                'featured' => true,
                'display_order' => 2,
            ],
            [
                'id' => 3,
                'title' => 'Monco.',
                'description' => 'An online local clothing store.',
                'tech_stack' => ['Laravel', 'MySQL', 'Blade', 'Inertia.js', 'Tailwind'],
                'github_url' => 'https://github.com/willie09/monscow-ecommerce',
                'live_url' => '',
                'image' => 'images/2.png',
                'featured' => true,
                'display_order' => 3,
            ],
        ];

        return collect($projects)->map(fn($project) => (object) $project)->values()->toArray();
    }
}

