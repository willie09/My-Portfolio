@extends('layouts.auth')

@section('auth-title', 'Create an account')
@section('auth-description', 'Enter your details below to create your account')

@section('auth-content')
<form class="flex flex-col gap-6" action="{{ route('register') }}" method="POST">
    @csrf
    <div class="grid gap-6">
        <div class="grid gap-2">
            <label for="name" class="text-sm font-medium">Name</label>
            <input id="name" name="name" type="text" required autofocus autocomplete="name" value="{{ old('name') }}" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Full name" />
            @error('name')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="grid gap-2">
            <label for="email" class="text-sm font-medium">Email address</label>
            <input id="email" name="email" type="email" required autocomplete="email" value="{{ old('email') }}" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="email@example.com" />
            @error('email')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="grid gap-2">
            <label for="password" class="text-sm font-medium">Password</label>
            <input id="password" name="password" type="password" required autocomplete="new-password" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Password" />
            @error('password')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="grid gap-2">
            <label for="password_confirmation" class="text-sm font-medium">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Confirm password" />
            @error('password_confirmation')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="mt-2 w-full rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">Create account</button>
    </div>

    <div class="text-center text-sm text-muted-foreground">
        Already have an account? <a href="{{ route('login') }}" class="text-primary hover:underline">Log in</a>
    </div>
</form>
@endsection

