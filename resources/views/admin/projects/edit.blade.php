@extends('layouts.admin')

@section('title', 'Edit Project')

@section('body')
<div class="flex flex-1 flex-col gap-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.projects.index') }}" class="rounded-md border border-border p-2 transition-colors hover:bg-muted">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h1 class="text-2xl font-bold tracking-tight">Edit Project</h1>
    </div>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="mx-auto max-w-2xl space-y-6 rounded-xl border border-border bg-card p-6">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="mb-2 block text-sm font-medium">Title *</label>
            <input id="title" name="title" type="text" required value="{{ old('title', $project->title) }}" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Project title" />
            @error('title')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="description" class="mb-2 block text-sm font-medium">Description *</label>
            <textarea id="description" name="description" rows="4" required class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Project description">{{ old('description', $project->description) }}</textarea>
            @error('description')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="mb-2 block text-sm font-medium">Tech Stack</label>
            <div class="flex gap-2">
                <input type="text" id="tech-input" class="flex-1 rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Add a technology (e.g. Laravel)" onkeydown="if(event.key==='Enter'){event.preventDefault();addTech();}" />
                <button type="button" onclick="addTech()" class="rounded-md border border-border px-3 py-2 transition-colors hover:bg-muted">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                </button>
            </div>
            <div id="tech-tags" class="mt-2 flex flex-wrap gap-2"></div>
            <input type="hidden" name="tech_stack" id="tech-stack-input" />
            @error('tech_stack')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="github_url" class="mb-2 block text-sm font-medium">GitHub URL</label>
                <input id="github_url" name="github_url" type="url" value="{{ old('github_url', $project->github_url) }}" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="https://github.com/..." />
                @error('github_url')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="live_url" class="mb-2 block text-sm font-medium">Live URL</label>
                <input id="live_url" name="live_url" type="url" value="{{ old('live_url', $project->live_url) }}" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="https://..." />
                @error('live_url')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="display_order" class="mb-2 block text-sm font-medium">Display Order</label>
                <input id="display_order" name="display_order" type="number" value="{{ old('display_order', $project->display_order) }}" class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary" />
            </div>
            <div class="flex items-end">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }} class="h-4 w-4 rounded border-border" />
                    <span class="text-sm font-medium">Featured Project</span>
                </label>
            </div>
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit" class="rounded-md bg-primary px-6 py-2 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">Save Changes</button>
            <a href="{{ route('admin.projects.index') }}" class="rounded-md border border-border px-6 py-2 text-sm font-medium transition-colors hover:bg-muted">Cancel</a>
        </div>
    </form>
</div>

<script>
let techStack = @json(old('tech_stack', $project->tech_stack ?? []));
if (typeof techStack === 'string') {
    try { techStack = JSON.parse(techStack); } catch(e) { techStack = []; }
}
if (!Array.isArray(techStack)) techStack = [];

const techInput = document.getElementById('tech-input');
const techTags = document.getElementById('tech-tags');
const techStackInput = document.getElementById('tech-stack-input');

function addTech() {
    const val = techInput.value.trim();
    if (val && !techStack.includes(val)) {
        techStack.push(val);
        renderTags();
        techInput.value = '';
    }
}

function removeTech(tech) {
    techStack = techStack.filter(t => t !== tech);
    renderTags();
}

function renderTags() {
    techTags.innerHTML = techStack.map(tech =>
        `<span class="inline-flex items-center gap-1 rounded-full bg-primary/10 px-3 py-1 text-sm font-medium text-primary">
            ${tech}
            <button type="button" onclick="removeTech('${tech}')" class="text-primary/60 hover:text-primary">
                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </span>`
    ).join('');
    techStackInput.value = JSON.stringify(techStack);
}

renderTags();
</script>
@endsection

