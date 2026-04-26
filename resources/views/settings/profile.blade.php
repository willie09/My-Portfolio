@extends('layouts.settings')

@section('title', 'Profile Settings')

@section('settings-content')
<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium">Profile information</h3>
        <p class="text-sm text-muted-foreground">Update your name and email address</p>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PATCH')

        <div class="grid gap-2">
            <label for="name" class="text-sm font-medium">Name</label>
            <input id="name" name="name" type="text" required autocomplete="name" value="{{ old('name', auth()->user()->name) }}" class="mt-1 block w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Full name" />
            @error('name')<p class="mt-2 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="grid gap-2">
            <label for="email" class="text-sm font-medium">Email address</label>
            <input id="email" name="email" type="email" required autocomplete="username" value="{{ old('email', auth()->user()->email) }}" class="mt-1 block w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Email address" />
            @error('email')<p class="mt-2 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        @if($mustVerifyEmail && !auth()->user()->email_verified_at)
        <div>
            <p class="mt-2 text-sm text-neutral-800">
                Your email address is unverified.
                <form action="{{ route('verification.send') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="rounded-md text-sm text-neutral-600 underline hover:text-neutral-900">Click here to re-send the verification email.</button>
                </form>
            </p>

            @if($status === 'verification-link-sent')
            <div class="mt-2 text-sm font-medium text-green-600">
                A new verification link has been sent to your email address.
            </div>
            @endif
        </div>
        @endif

        <div class="flex items-center gap-4">
            <button type="submit" class="rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">Save</button>
            @if(session('status') === 'profile-updated')
            <p class="text-sm text-neutral-600">Saved</p>
            @endif
        </div>
    </form>
</div>

<div class="mt-8 border-t border-border pt-6">
    <h3 class="text-lg font-medium text-red-600">Delete Account</h3>
    <p class="text-sm text-muted-foreground">Once your account is deleted, all of its resources and data will be permanently deleted.</p>

    <form action="{{ route('profile.destroy') }}" method="POST" class="mt-4" onsubmit="return confirm('Are you sure you want to delete your account?')">
        @csrf
        @method('DELETE')
        <div class="grid gap-2">
            <label for="delete_password" class="text-sm font-medium">Password</label>
            <input id="delete_password" name="password" type="password" required class="w-full max-w-sm rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Enter your password to confirm" />
            @error('password', 'userDeletion')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>
        <button type="submit" class="mt-4 rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-red-700">Delete Account</button>
    </form>
</div>
@endsection

