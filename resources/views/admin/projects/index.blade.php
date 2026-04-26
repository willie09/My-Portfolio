@extends('layouts.admin')

@section('title', 'Projects')

@section('body')
<div class="flex flex-1 flex-col gap-6">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="rounded-md border border-border p-2 transition-colors hover:bg-muted">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h1 class="text-2xl font-bold tracking-tight">Projects</h1>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Project
        </a>
    </div>

    <div class="rounded-xl border border-border bg-card">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-border bg-muted/50">
                        <th class="px-4 py-3 text-left text-sm font-medium">Title</th>
                        <th class="hidden px-4 py-3 text-left text-sm font-medium md:table-cell">Tech Stack</th>
                        <th class="px-4 py-3 text-center text-sm font-medium">Featured</th>
                        <th class="px-4 py-3 text-center text-sm font-medium">Order</th>
                        <th class="px-4 py-3 text-right text-sm font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr class="border-b border-border transition-colors hover:bg-muted/50">
                        <td class="px-4 py-3">
                            <p class="font-medium">{{ $project->title }}</p>
                            <p class="max-w-xs truncate text-sm text-muted-foreground">{{ $project->description }}</p>
                        </td>
                        <td class="hidden px-4 py-3 md:table-cell">
                            <div class="flex flex-wrap gap-1">
                                @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                                <span class="rounded-full bg-primary/10 px-2 py-0.5 text-xs font-medium text-primary">{{ $tech }}</span>
                                @endforeach
                                @if(count($project->tech_stack ?? []) > 3)
                                <span class="rounded-full bg-muted px-2 py-0.5 text-xs">+{{ count($project->tech_stack) - 3 }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($project->featured)
                            <svg class="mx-auto h-4 w-4 fill-amber-400 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                            @else
                            <span class="text-muted-foreground">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center text-sm">{{ $project->display_order }}</td>
                        <td class="px-4 py-3 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="rounded-md border border-border p-2 transition-colors hover:bg-muted">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-md border border-border p-2 text-red-600 transition-colors hover:bg-red-50">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

