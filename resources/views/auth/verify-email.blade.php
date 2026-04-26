@extends('layouts.auth')

@section('auth-title', 'Verify email')
@section('auth-description', 'Please verify your email address by clicking on the link we just emailed to you.')

@section('auth-content')
@if($status === 'verification-link-sent')
<div class="mb-4 rounded-md bg-green-50 px-4 py-3 text-center text-sm font-medium text-green-600">
    A new verification link has been sent to the email address you provided during registration.
</div>
@endif

<form action="{{ route('verification.send') }}" method="POST" class="space-y-6 text-center">
    @csrf
    <button type="submit" class="rounded-md border border-border bg-muted px-4 py-2 text-sm font-medium transition-colors hover:bg-muted/80">Resend verification email</button>

    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mx-auto block text-sm text-primary hover:underline">Log out</a>
</form>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>
@endsection

