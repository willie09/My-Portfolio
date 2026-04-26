@extends('layouts.auth')

@section('auth-title', 'Forgot password')
@section('auth-description', 'Enter your email to receive a password reset link')

@section('auth-content')
<div class="space-y-6">
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="grid gap-2">
            <label for="email" class="text-sm font-medium">Email address</label>
            <input id="email" name="email" type="email" required autofocus autocomplete="off" value="{{ old('email') }}" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="email@example.com" />
            @error('email')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="my-6 flex items-center justify-start">
            <button type="submit" class="w-full rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">Email password reset link</button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-muted-foreground">
        <span>Or, return to</span>
        <a href="{{ route('login') }}" class="text-primary hover:underline">log in</a>
    </div>
</div>
@endsection

