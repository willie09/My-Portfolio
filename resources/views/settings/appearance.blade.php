@extends('layouts.settings')

@section('title', 'Appearance Settings')

@section('settings-content')
<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium">Appearance settings</h3>
        <p class="text-sm text-muted-foreground">Update your account's appearance settings</p>
    </div>

    <div class="space-y-4">
        <p class="text-sm text-muted-foreground">The appearance of this application is controlled by your system preferences. Set your operating system to light or dark mode to see changes.</p>

        <div class="grid grid-cols-2 gap-4">
            <div class="rounded-lg border border-border bg-background p-4">
                <div class="mb-3 h-20 rounded-md bg-white shadow-sm"></div>
                <p class="text-center text-sm font-medium">Light</p>
            </div>
            <div class="rounded-lg border border-border bg-background p-4">
                <div class="mb-3 h-20 rounded-md bg-neutral-900 shadow-sm"></div>
                <p class="text-center text-sm font-medium">Dark</p>
            </div>
        </div>
    </div>
</div>
@endsection

