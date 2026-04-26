@extends('layouts.auth')

@section('auth-title', 'Reset password')
@section('auth-description', 'Please enter your new password below')

@section('auth-content')
<form action="{{ route('password.store') }}" method="POST">
    @csrf
    <div class="grid gap-6">
        <input type="hidden" name="token" value="{{ $token }}" />

        <div class="grid gap-2">
            <label for="email" class="text-sm font-medium">Email</label>
            <input id="email" name="email" type="email" required readonly value="{{ $email }}" class="w-full rounded-md border border-border bg-muted px-3 py-2 text-sm" />
            @error('email')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="grid gap-2">
            <label for="password" class="text-sm font-medium">Password</label>
            <input id="password" name="password" type="password" required autofocus autocomplete="new-password" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Password" />
            @error('password')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="grid gap-2">
            <label for="password_confirmation" class="text-sm font-medium">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Confirm password" />
            @error('password_confirmation')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="mt-4 w-full rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">Reset password</button>
    </div>
</form>
@endsection

