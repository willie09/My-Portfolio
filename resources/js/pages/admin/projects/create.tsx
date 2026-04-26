import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft, Plus, X } from 'lucide-react';
import { useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Projects', href: '/admin/projects' },
    { title: 'Create', href: '/admin/projects/create' },
];

export default function CreateProject() {
    const { data, setData, post, processing, errors } = useForm<{
        title: string;
        description: string;
        tech_stack: string[];
        github_url: string;
        live_url: string;
        image: string;
        featured: boolean;
        display_order: number;
    }>({
        title: '',
        description: '',
        tech_stack: [],
        github_url: '',
        live_url: '',
        image: '',
        featured: false,
        display_order: 0,
    });

    const [techInput, setTechInput] = useState('');

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        post(route('admin.projects.store'));
    };

    const addTech = () => {
        if (techInput.trim() && !data.tech_stack.includes(techInput.trim())) {
            setData('tech_stack', [...data.tech_stack, techInput.trim()]);
            setTechInput('');
        }
    };

    const removeTech = (tech: string) => {
        setData(
            'tech_stack',
            data.tech_stack.filter((t) => t !== tech),
        );
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Create Project" />
            <div className="flex h-full flex-1 flex-col gap-6 p-4 sm:p-6">
                <div className="flex items-center gap-4">
                    <Link href={route('admin.projects.index')} className="border-border hover:bg-muted rounded-md border p-2 transition-colors">
                        <ArrowLeft className="h-4 w-4" />
                    </Link>
                    <h1 className="text-2xl font-bold tracking-tight">Create Project</h1>
                </div>

                <form onSubmit={handleSubmit} className="border-border bg-card mx-auto max-w-2xl space-y-6 rounded-xl border p-6">
                    <div>
                        <label htmlFor="title" className="mb-2 block text-sm font-medium">
                            Title *
                        </label>
                        <input
                            id="title"
                            type="text"
                            value={data.title}
                            onChange={(e) => setData('title', e.target.value)}
                            className="border-border bg-background focus:border-primary focus:ring-primary w-full rounded-md border px-3 py-2 text-sm outline-none focus:ring-1"
                            placeholder="Project title"
                        />
                        {errors.title && <p className="mt-1 text-xs text-red-500">{errors.title}</p>}
                    </div>

                    <div>
                        <label htmlFor="description" className="mb-2 block text-sm font-medium">
                            Description *
                        </label>
                        <textarea
                            id="description"
                            rows={4}
                            value={data.description}
                            onChange={(e) => setData('description', e.target.value)}
                            className="border-border bg-background focus:border-primary focus:ring-primary w-full rounded-md border px-3 py-2 text-sm outline-none focus:ring-1"
                            placeholder="Project description"
                        />
                        {errors.description && <p className="mt-1 text-xs text-red-500">{errors.description}</p>}
                    </div>

                    <div>
                        <label className="mb-2 block text-sm font-medium">Tech Stack</label>
                        <div className="flex gap-2">
                            <input
                                type="text"
                                value={techInput}
                                onChange={(e) => setTechInput(e.target.value)}
                                onKeyDown={(e) => e.key === 'Enter' && (e.preventDefault(), addTech())}
                                className="border-border bg-background focus:border-primary focus:ring-primary flex-1 rounded-md border px-3 py-2 text-sm outline-none focus:ring-1"
                                placeholder="Add a technology (e.g. React)"
                            />
                            <button
                                type="button"
                                onClick={addTech}
                                className="border-border hover:bg-muted rounded-md border px-3 py-2 transition-colors"
                            >
                                <Plus className="h-4 w-4" />
                            </button>
                        </div>
                        <div className="mt-2 flex flex-wrap gap-2">
                            {data.tech_stack.map((tech) => (
                                <span
                                    key={tech}
                                    className="bg-primary/10 text-primary inline-flex items-center gap-1 rounded-full px-3 py-1 text-sm font-medium"
                                >
                                    {tech}
                                    <button type="button" onClick={() => removeTech(tech)}>
                                        <X className="h-3 w-3" />
                                    </button>
                                </span>
                            ))}
                        </div>
                    </div>

                    <div className="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label htmlFor="github_url" className="mb-2 block text-sm font-medium">
                                GitHub URL
                            </label>
                            <input
                                id="github_url"
                                type="url"
                                value={data.github_url}
                                onChange={(e) => setData('github_url', e.target.value)}
                                className="border-border bg-background focus:border-primary focus:ring-primary w-full rounded-md border px-3 py-2 text-sm outline-none focus:ring-1"
                                placeholder="https://github.com/..."
                            />
                            {errors.github_url && <p className="mt-1 text-xs text-red-500">{errors.github_url}</p>}
                        </div>
                        <div>
                            <label htmlFor="live_url" className="mb-2 block text-sm font-medium">
                                Live URL
                            </label>
                            <input
                                id="live_url"
                                type="url"
                                value={data.live_url}
                                onChange={(e) => setData('live_url', e.target.value)}
                                className="border-border bg-background focus:border-primary focus:ring-primary w-full rounded-md border px-3 py-2 text-sm outline-none focus:ring-1"
                                placeholder="https://..."
                            />
                            {errors.live_url && <p className="mt-1 text-xs text-red-500">{errors.live_url}</p>}
                        </div>
                    </div>

                    <div className="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label htmlFor="display_order" className="mb-2 block text-sm font-medium">
                                Display Order
                            </label>
                            <input
                                id="display_order"
                                type="number"
                                value={data.display_order}
                                onChange={(e) => setData('display_order', parseInt(e.target.value) || 0)}
                                className="border-border bg-background focus:border-primary focus:ring-primary w-full rounded-md border px-3 py-2 text-sm outline-none focus:ring-1"
                            />
                        </div>
                        <div className="flex items-end">
                            <label className="flex items-center gap-2">
                                <input
                                    type="checkbox"
                                    checked={data.featured}
                                    onChange={(e) => setData('featured', e.target.checked)}
                                    className="border-border h-4 w-4 rounded"
                                />
                                <span className="text-sm font-medium">Featured Project</span>
                            </label>
                        </div>
                    </div>

                    <div className="flex gap-3 pt-4">
                        <button
                            type="submit"
                            disabled={processing}
                            className="bg-primary text-primary-foreground hover:bg-primary/90 rounded-md px-6 py-2 text-sm font-medium transition-colors disabled:opacity-50"
                        >
                            {processing ? 'Creating...' : 'Create Project'}
                        </button>
                        <Link
                            href={route('admin.projects.index')}
                            className="border-border hover:bg-muted rounded-md border px-6 py-2 text-sm font-medium transition-colors"
                        >
                            Cancel
                        </Link>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
