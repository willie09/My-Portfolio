@extends('layouts.auth')

@section('auth-title', 'Confirm your password')
@section('auth-description', 'This is a secure area of the application. Please confirm your password before continuing.')

@section('auth-content')
<form action="{{ route('password.confirm') }}" method="POST">
    @csrf
    <div class="space-y-6">
        <div class="grid gap-2">
            <label for="password" class="text-sm font-medium">Password</label>
            <input id="password" name="password" type="password" required autofocus autocomplete="current-password" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Password" />
            @error('password')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center">
            <button type="submit" class="w-full rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">Confirm password</button>
        </div>
    </div>
</form>
@endsection

