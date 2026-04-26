@extends('layouts.admin')

@section('body')
<div class="mx-auto max-w-3xl">
    <div class="mb-6">
        <h1 class="text-2xl font-bold tracking-tight">Settings</h1>
        <p class="text-muted-foreground">Manage your account settings and preferences.</p>
    </div>

    <div class="grid gap-6 md:grid-cols-[200px_1fr]">
        <!-- Settings Sidebar -->
        <nav class="space-y-1">
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 rounded-md px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('profile.edit') ? 'bg-primary text-primary-foreground' : 'text-muted-foreground hover:bg-muted hover:text-foreground' }}">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Profile
            </a>
            <a href="{{ route('password.edit') }}" class="flex items-center gap-2 rounded-md px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('password.edit') ? 'bg-primary text-primary-foreground' : 'text-muted-foreground hover:bg-muted hover:text-foreground' }}">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                Password
            </a>
            <a href="{{ route('appearance') }}" class="flex items-center gap-2 rounded-md px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('appearance') ? 'bg-primary text-primary-foreground' : 'text-muted-foreground hover:bg-muted hover:text-foreground' }}">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                Appearance
            </a>
        </nav>

        <!-- Settings Content -->
        <div class="rounded-xl border border-border bg-card p-6">
            @yield('settings-content')
        </div>
    </div>
</div>
@endsection

