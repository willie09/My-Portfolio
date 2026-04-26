@extends('layouts.auth')

@section('auth-title', 'Log in to your account')
@section('auth-description', 'Enter your email and password below to log in')

@section('auth-content')
<form class="flex flex-col gap-6" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="grid gap-6">
        <div class="grid gap-2">
            <label for="email" class="text-sm font-medium">Email address</label>
            <input id="email" name="email" type="email" required autofocus autocomplete="email" value="{{ old('email') }}" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="email@example.com" />
            @error('email')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="grid gap-2">
            <div class="flex items-center">
                <label for="password" class="text-sm font-medium">Password</label>
                @if($canResetPassword)
                <a href="{{ route('password.request') }}" class="ml-auto text-sm text-primary hover:underline">Forgot password?</a>
                @endif
            </div>
            <input id="password" name="password" type="password" required autocomplete="current-password" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Password" />
            @error('password')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center space-x-3">
            <input type="checkbox" id="remember" name="remember" class="h-4 w-4 rounded border-border" />
            <label for="remember" class="text-sm font-medium">Remember me</label>
        </div>

        <button type="submit" class="mt-4 w-full rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">Log in</button>
    </div>

    <div class="text-center text-sm text-muted-foreground">
        Don't have an account? <a href="{{ route('register') }}" class="text-primary hover:underline">Sign up</a>
    </div>
</form>
@endsection

