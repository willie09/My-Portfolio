@extends('layouts.admin')

@section('title', 'Messages')

@section('body')
@php
$unreadCount = $messages->filter(fn($m) => !$m->read_at)->count();
@endphp

<div class="flex flex-1 flex-col gap-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('dashboard') }}" class="rounded-md border border-border p-2 transition-colors hover:bg-muted">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold tracking-tight">Messages</h1>
            <p class="text-sm text-muted-foreground">{{ $unreadCount }} unread of {{ $messages->count() }} total</p>
        </div>
    </div>

    @if($messages->isEmpty())
    <div class="flex flex-1 items-center justify-center rounded-xl border border-border bg-card p-12">
        <div class="text-center">
            <svg class="mx-auto h-12 w-12 text-muted-foreground/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <h3 class="mt-4 text-lg font-semibold">No messages yet</h3>
            <p class="mt-2 text-sm text-muted-foreground">When visitors contact you through your portfolio, messages will appear here.</p>
        </div>
    </div>
    @else
    <div class="space-y-4">
        @foreach($messages as $message)
        <div class="rounded-xl border p-6 transition-all {{ $message->read_at ? 'border-border bg-card' : 'border-primary/20 bg-primary/5' }}">
            <div class="flex items-start justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full {{ $message->read_at ? 'bg-muted' : 'bg-primary/10' }}">
                        @if($message->read_at)
                        <svg class="h-5 w-5 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"/></svg>
                        @else
                        <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        @endif
                    </div>
                    <div>
                        <div class="flex flex-wrap items-center gap-3">
                            <h3 class="font-semibold">{{ $message->subject }}</h3>
                            @if(!$message->read_at)
                            <span class="rounded-full bg-primary px-2 py-0.5 text-xs font-medium text-primary-foreground">New</span>
                            @endif
                        </div>
                        <div class="mt-1 flex flex-wrap items-center gap-4 text-sm text-muted-foreground">
                            <span class="flex items-center gap-1.5">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                {{ $message->name }}
                            </span>
                            <span>{{ $message->email }}</span>
                            <span class="flex items-center gap-1.5">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $message->created_at->format('M d, Y g:i A') }}
                            </span>
                        </div>
                        <p class="mt-3 text-sm leading-relaxed">{{ $message->message }}</p>
                    </div>
                </div>
                @if(!$message->read_at)
                <form action="{{ route('admin.messages.read', $message) }}" method="POST" class="shrink-0">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="flex items-center gap-1.5 rounded-md border border-border px-3 py-1.5 text-sm transition-colors hover:bg-muted">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Mark read
                    </button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection

