@extends('layouts.public')

@section('title', 'Projects')

@section('body')
<div class="min-h-screen bg-background">
    <!-- Header -->
    <div class="border-b border-border">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6 sm:px-6 lg:px-8">
            <div>
                <a href="{{ route('home') }}" class="mb-4 inline-flex items-center gap-2 text-sm text-muted-foreground transition-colors hover:text-foreground">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to Home
                </a>
                <h1 class="text-3xl font-bold tracking-tight">All Projects</h1>
                <p class="mt-2 text-muted-foreground">A complete collection of my work</p>
            </div>
        </div>
    </div>

    <!-- Projects Grid -->
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $project)
            <div class="group flex flex-col rounded-xl border border-border bg-card transition-all hover:shadow-lg">
@if($project->image)
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="h-48 w-full rounded-t-xl object-cover" loading="lazy" />
@else
                    <div class="flex h-48 items-center justify-center rounded-t-xl bg-gradient-to-br from-primary/10 to-primary/5">
                        <svg class="h-12 w-12 text-primary/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
@endif
                <div class="flex flex-1 flex-col p-6">
                    <div class="mb-2 flex items-center gap-2">
                        <h3 class="text-lg font-semibold">{{ $project->title }}</h3>
                        @if($project->featured)
                        <span class="rounded-full bg-primary/10 px-2 py-0.5 text-xs font-medium text-primary">Featured</span>
                        @endif
                    </div>
                    <p class="mb-4 flex-1 text-sm text-muted-foreground">{{ $project->description }}</p>
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
    </div>
</div>
@endsection

