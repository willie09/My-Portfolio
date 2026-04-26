@extends('layouts.settings')

@section('title', 'Password Settings')

@section('settings-content')
<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium">Update password</h3>
        <p class="text-sm text-muted-foreground">Ensure your account is using a long, random password to stay secure</p>
    </div>

    <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid gap-2">
            <label for="current_password" class="text-sm font-medium">Current password</label>
            <input id="current_password" name="current_password" type="password" required autocomplete="current-password" class="mt-1 block w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Current password" />
            @error('current_password')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="grid gap-2">
            <label for="password" class="text-sm font-medium">New password</label>
            <input id="password" name="password" type="password" required autocomplete="new-password" class="mt-1 block w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="New password" />
            @error('password')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="grid gap-2">
            <label for="password_confirmation" class="text-sm font-medium">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="mt-1 block w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Confirm password" />
            @error('password_confirmation')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">Save password</button>
            @if(session('status') === 'password-updated')
            <p class="text-sm text-neutral-600">Saved</p>
            @endif
        </div>
    </form>
</div>
@endsection

