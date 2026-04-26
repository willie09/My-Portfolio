import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft, Pencil, Plus, Star, Trash2 } from 'lucide-react';

interface Project {
    id: number;
    title: string;
    description: string;
    tech_stack: string[];
    github_url: string | null;
    live_url: string | null;
    featured: boolean;
    display_order: number;
}

interface ProjectsIndexProps {
    projects: Project[];
}

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Projects', href: '/admin/projects' },
];

export default function ProjectsIndex({ projects }: ProjectsIndexProps) {
    const { delete: destroy } = useForm();

    const handleDelete = (projectId: number) => {
        if (confirm('Are you sure you want to delete this project?')) {
            destroy(route('admin.projects.destroy', projectId));
        }
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Projects" />
            <div className="flex h-full flex-1 flex-col gap-6 p-4 sm:p-6">
                <div className="flex items-center justify-between">
                    <div className="flex items-center gap-4">
                        <Link href={route('dashboard')} className="border-border hover:bg-muted rounded-md border p-2 transition-colors">
                            <ArrowLeft className="h-4 w-4" />
                        </Link>
                        <h1 className="text-2xl font-bold tracking-tight">Projects</h1>
                    </div>
                    <Link
                        href={route('admin.projects.create')}
                        className="bg-primary text-primary-foreground hover:bg-primary/90 inline-flex items-center gap-2 rounded-md px-4 py-2 text-sm font-medium transition-colors"
                    >
                        <Plus className="h-4 w-4" />
                        New Project
                    </Link>
                </div>

                <div className="border-border bg-card rounded-xl border">
                    <div className="overflow-x-auto">
                        <table className="w-full">
                            <thead>
                                <tr className="border-border bg-muted/50 border-b">
                                    <th className="px-4 py-3 text-left text-sm font-medium">Title</th>
                                    <th className="hidden px-4 py-3 text-left text-sm font-medium md:table-cell">Tech Stack</th>
                                    <th className="px-4 py-3 text-center text-sm font-medium">Featured</th>
                                    <th className="px-4 py-3 text-center text-sm font-medium">Order</th>
                                    <th className="px-4 py-3 text-right text-sm font-medium">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {projects.map((project) => (
                                    <tr key={project.id} className="border-border hover:bg-muted/50 border-b transition-colors">
                                        <td className="px-4 py-3">
                                            <p className="font-medium">{project.title}</p>
                                            <p className="text-muted-foreground max-w-xs truncate text-sm">{project.description}</p>
                                        </td>
                                        <td className="hidden px-4 py-3 md:table-cell">
                                            <div className="flex flex-wrap gap-1">
                                                {project.tech_stack?.slice(0, 3).map((tech) => (
                                                    <span
                                                        key={tech}
                                                        className="bg-primary/10 text-primary rounded-full px-2 py-0.5 text-xs font-medium"
                                                    >
                                                        {tech}
                                                    </span>
                                                ))}
                                                {project.tech_stack && project.tech_stack.length > 3 && (
                                                    <span className="bg-muted rounded-full px-2 py-0.5 text-xs">
                                                        +{project.tech_stack.length - 3}
                                                    </span>
                                                )}
                                            </div>
                                        </td>
                                        <td className="px-4 py-3 text-center">
                                            {project.featured ? (
                                                <Star className="mx-auto h-4 w-4 fill-amber-400 text-amber-400" />
                                            ) : (
                                                <span className="text-muted-foreground">-</span>
                                            )}
                                        </td>
                                        <td className="px-4 py-3 text-center text-sm">{project.display_order}</td>
                                        <td className="px-4 py-3 text-right">
                                            <div className="flex items-center justify-end gap-2">
                                                <Link
                                                    href={route('admin.projects.edit', project.id)}
                                                    className="border-border hover:bg-muted rounded-md border p-2 transition-colors"
                                                >
                                                    <Pencil className="h-4 w-4" />
                                                </Link>
                                                <button
                                                    onClick={() => handleDelete(project.id)}
                                                    className="border-border rounded-md border p-2 text-red-600 transition-colors hover:bg-red-50"
                                                >
                                                    <Trash2 className="h-4 w-4" />
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
