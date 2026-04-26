@extends('layouts.admin')

@section('title', 'Dashboard')

@section('body')
<div class="flex flex-1 flex-col gap-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold tracking-tight">Dashboard</h1>
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Project
        </a>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-4 rounded-xl border border-border bg-card p-4 transition-all hover:shadow-md">
            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-50">
                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h9a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/></svg>
            </div>
            <div>
                <p class="text-sm text-muted-foreground">Total Projects</p>
                <p class="text-2xl font-bold">{{ $projectsCount }}</p>
            </div>
        </a>
        <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-4 rounded-xl border border-border bg-card p-4 transition-all hover:shadow-md">
            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-amber-50">
                <svg class="h-6 w-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
            </div>
            <div>
                <p class="text-sm text-muted-foreground">Featured Projects</p>
                <p class="text-2xl font-bold">{{ $featuredProjectsCount }}</p>
            </div>
        </a>
        <a href="{{ route('admin.messages') }}" class="flex items-center gap-4 rounded-xl border border-border bg-card p-4 transition-all hover:shadow-md">
            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-50">
                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-sm text-muted-foreground">Total Messages</p>
                <p class="text-2xl font-bold">{{ $messagesCount }}</p>
            </div>
        </a>
        <a href="{{ route('admin.messages') }}" class="flex items-center gap-4 rounded-xl border border-border bg-card p-4 transition-all hover:shadow-md">
            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-red-50">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"/></svg>
            </div>
            <div>
                <p class="text-sm text-muted-foreground">Unread Messages</p>
                <p class="text-2xl font-bold">{{ $unreadMessagesCount }}</p>
            </div>
        </a>
    </div>

    <div class="grid gap-6 md:grid-cols-2">
        <div class="rounded-xl border border-border bg-card p-6">
            <h2 class="mb-4 text-lg font-semibold">Quick Actions</h2>
            <div class="space-y-3">
                <a href="{{ route('admin.projects.create') }}" class="flex items-center justify-between rounded-lg border border-border p-3 transition-colors hover:bg-muted">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <span class="text-sm font-medium">Add New Project</span>
                    </div>
                    <svg class="h-4 w-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
                <a href="{{ route('admin.projects.index') }}" class="flex items-center justify-between rounded-lg border border-border p-3 transition-colors hover:bg-muted">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h9a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/></svg>
                        <span class="text-sm font-medium">Manage Projects</span>
                    </div>
                    <svg class="h-4 w-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
                <a href="{{ route('admin.messages') }}" class="flex items-center justify-between rounded-lg border border-border p-3 transition-colors hover:bg-muted">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span class="text-sm font-medium">View Messages</span>
                    </div>
                    <svg class="h-4 w-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>
        </div>

        <div class="rounded-xl border border-border bg-card p-6">
            <h2 class="mb-4 text-lg font-semibold">Portfolio Overview</h2>
            <p class="mb-4 text-sm text-muted-foreground">
                Welcome to your portfolio admin panel. Here you can manage your projects, view contact messages, and track your portfolio's performance.
            </p>
            <div class="rounded-lg bg-muted p-4">
                <p class="text-sm font-medium">Tip</p>
                <p class="text-sm text-muted-foreground">Keep your featured projects up to date to make the best impression on visitors.</p>
            </div>
        </div>
    </div>
</div>
@endsection

