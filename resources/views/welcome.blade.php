@extends('layouts.public')

@section('title', 'Portfolio')

@section('body')
<!-- Hero Section -->
<section class="relative flex min-h-screen items-center justify-center px-4 pt-20">
    <div class="mx-auto max-w-4xl text-center">
        <div class="mb-6 inline-flex items-center rounded-full border border-border bg-muted px-3 py-1 text-sm">
            <span class="mr-2 inline-block h-2 w-2 animate-pulse rounded-full bg-green-500"></span>
            Available for freelance work
        </div>
        <h1 class="mb-6 text-4xl font-bold tracking-tight sm:text-6xl lg:text-7xl">
            Building digital <span class="text-primary">experiences</span> that matter
        </h1>
        <p class="mx-auto mb-10 max-w-2xl text-lg text-muted-foreground sm:text-xl">
            Full-stack developer crafting robust, scalable web applications with Laravel and modern tools. Passionate about clean code, user experience, and solving real-world problems.
        </p>
        <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="#projects" class="rounded-md bg-primary px-8 py-3 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">View My Work</a>
            <a href="#contact" class="rounded-md border border-border px-8 py-3 text-sm font-medium transition-colors hover:bg-muted">Get in Touch</a>
        </div>
        <div class="mt-16 flex justify-center">
            <a href="#about" class="animate-bounce">
                <svg class="h-6 w-6 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="px-4 py-24 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="grid items-center gap-12 lg:grid-cols-2">
            <div>
                <h2 class="mb-4 text-3xl font-bold tracking-tight sm:text-4xl">About Me</h2>
                <div class="mb-6 h-1 w-20 rounded-full bg-primary"></div>
                <p class="mb-4 text-muted-foreground">
                    I'm a passionate full-stack developer with expertise in building modern web applications. My journey in software development started with a curiosity for how things work on the web, which evolved into a career focused on creating impactful digital solutions.
                </p>
                <p class="mb-6 text-muted-foreground">
                    I specialize in the Laravel ecosystem delivering robust, performant applications with exceptional user experiences.
                </p>
                <div class="flex gap-4">
                    <a href="https://github.com" target="_blank" class="rounded-md border border-border p-3 transition-colors hover:bg-muted">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                    <a href="mailto:hello@example.com" class="rounded-md border border-border p-3 transition-colors hover:bg-muted">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </a>
                </div>
            </div>
            <div class="grid gap-6 sm:grid-cols-2">
                @php
                $services = [
                    ['icon' => 'code', 'title' => 'Full-Stack Development', 'desc' => 'End-to-end web application development using Laravel with modern architecture patterns.'],
                    ['icon' => 'layers', 'title' => 'API Design', 'desc' => 'Building robust RESTful APIs with proper authentication, documentation, and versioning strategies.'],
                    ['icon' => 'zap', 'title' => 'Performance Optimization', 'desc' => 'Analyzing and improving application speed through caching, database optimization, and code refactoring.'],
                    ['icon' => 'shield', 'title' => 'Security Hardening', 'desc' => 'Implementing security best practices including authentication, authorization, and data protection.'],
                ];
                @endphp
                @foreach($services as $service)
                <div class="rounded-xl border border-border bg-card p-6 transition-all hover:shadow-lg">
                    @if($service['icon'] === 'code')
                        <svg class="mb-4 h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    @elseif($service['icon'] === 'layers')
                        <svg class="mb-4 h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    @elseif($service['icon'] === 'zap')
                        <svg class="mb-4 h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    @else
                        <svg class="mb-4 h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    @endif
                    <h3 class="mb-2 font-semibold">{{ $service['title'] }}</h3>
                    <p class="text-sm text-muted-foreground">{{ $service['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="bg-muted/50 px-4 py-24 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-12 text-center">
            <h2 class="mb-4 text-3xl font-bold tracking-tight sm:text-4xl">Technical Skills</h2>
            <p class="mx-auto max-w-2xl text-muted-foreground">A comprehensive toolkit built over years of hands-on development experience</p>
        </div>
        @php
        $skillGroups = [
            'Backend' => ['Laravel', 'PHP', 'REST APIs', 'Testing'],
            'Frontend' => ['Blade', 'Tailwind CSS', 'Alpine.js'],
            'Database' => ['MySQL', 'SQLite'],
            'Tools' => ['Git', 'Docker'],
        ];
        @endphp
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($skillGroups as $category => $skills)
            <div class="rounded-xl border border-border bg-background p-6">
                <h3 class="mb-4 font-semibold text-primary">{{ $category }}</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($skills as $skill)
                    <span class="rounded-full bg-muted px-3 py-1 text-sm font-medium">{{ $skill }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="px-4 py-24 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-12 flex items-end justify-between">
            <div>
                <h2 class="mb-4 text-3xl font-bold tracking-tight sm:text-4xl">Featured Projects</h2>
                <p class="max-w-2xl text-muted-foreground">A selection of projects that showcase my skills and passion for development</p>
            </div>
            <a href="{{ route('projects') }}" class="hidden items-center gap-2 text-sm font-medium text-primary hover:underline sm:flex">
                View All Projects
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($featuredProjects as $project)
            <div class="group flex flex-col rounded-xl border border-border bg-card transition-all hover:shadow-lg">
                <div class="flex h-48 items-center justify-center rounded-t-xl bg-gradient-to-br from-primary/10 to-primary/5">
                    <svg class="h-12 w-12 text-primary/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <div class="flex flex-1 flex-col p-6">
                    <h3 class="mb-2 text-lg font-semibold">{{ $project->title }}</h3>
                    <p class="mb-4 line-clamp-3 flex-1 text-sm text-muted-foreground">{{ $project->description }}</p>
                    <div class="mb-4 flex flex-wrap gap-2">
                        @foreach($project->tech_stack ?? [] as $tech)
                        <span class="rounded-full bg-primary/10 px-2 py-0.5 text-xs font-medium text-primary">{{ $tech }}</span>
                        @endforeach
                    </div>
                    <div class="flex gap-3">
                        @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="flex items-center gap-1.5 rounded-md border border-border px-3 py-1.5 text-sm transition-colors hover:bg-muted">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            Code
                        </a>
                        @endif
                        @if($project->live_url)
                        <a href="{{ $project->live_url }}" target="_blank" class="flex items-center gap-1.5 rounded-md bg-primary px-3 py-1.5 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                            Live
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8 text-center sm:hidden">
            <a href="{{ route('projects') }}" class="inline-flex items-center gap-2 text-sm font-medium text-primary hover:underline">
                View All Projects
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="bg-muted/50 px-4 py-24 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-12 lg:grid-cols-2">
            <div>
                <h2 class="mb-4 text-3xl font-bold tracking-tight sm:text-4xl">Let's Work Together</h2>
                <p class="mb-8 text-muted-foreground">
                    Have a project in mind or want to discuss opportunities? I'd love to hear from you. Fill out the form and I'll get back to you as soon as possible.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10">
                            <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Email</p>
                            <p class="text-sm text-muted-foreground">hello@example.com</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10">
                            <svg class="h-5 w-5 text-primary" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium">GitHub</p>
                            <p class="text-sm text-muted-foreground">github.com/example</p>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-4 rounded-xl border border-border bg-background p-6 sm:p-8">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium">Name</label>
                        <input id="name" name="name" type="text" required value="{{ old('name') }}" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Your name" />
                        @error('name')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium">Email</label>
                        <input id="email" name="email" type="email" required value="{{ old('email') }}" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="your@email.com" />
                        @error('email')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div>
                    <label for="subject" class="mb-2 block text-sm font-medium">Subject</label>
                    <input id="subject" name="subject" type="text" required value="{{ old('subject') }}" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="What's this about?" />
                    @error('subject')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="message" class="mb-2 block text-sm font-medium">Message</label>
                    <textarea id="message" name="message" rows="5" required class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Tell me about your project...">{{ old('message') }}</textarea>
                    @error('message')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="w-full rounded-md bg-primary px-4 py-3 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</section>
@endsection

