@extends('layouts.app')

@section('content')
<div class="flex min-h-screen flex-col items-center justify-center bg-muted/50 px-4 py-12">
    <div class="w-full max-w-md">
        <div class="mb-8 text-center">
            <a href="/" class="text-2xl font-bold tracking-tight">Portfolio</a>
        </div>

        <div class="rounded-xl border border-border bg-card p-8 shadow-sm">
            <div class="mb-6">
                <h1 class="text-xl font-semibold tracking-tight">@yield('auth-title')</h1>
                <p class="mt-1 text-sm text-muted-foreground">@yield('auth-description')</p>
            </div>

            @if(session('status'))
                <div class="mb-4 rounded-md bg-green-50 px-4 py-3 text-sm font-medium text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            @yield('auth-content')
        </div>
    </div>
</div>
@endsection

