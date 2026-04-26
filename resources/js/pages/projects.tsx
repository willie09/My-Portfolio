import { Head, Link } from '@inertiajs/react';
import { ArrowLeft, Github, Globe, Layers } from 'lucide-react';

interface ProjectsProps {
    projects: Array<{
        id: number;
        title: string;
        description: string;
        tech_stack: string[];
        github_url: string | null;
        live_url: string | null;
        image: string | null;
        featured: boolean;
    }>;
}

export default function Projects({ projects }: ProjectsProps) {
    return (
        <>
            <Head title="Projects" />

            <div className="bg-background min-h-screen">
                {/* Header */}
                <div className="border-border border-b">
                    <div className="mx-auto flex max-w-7xl items-center justify-between px-4 py-6 sm:px-6 lg:px-8">
                        <div>
                            <Link
                                href={route('home')}
                                className="text-muted-foreground hover:text-foreground mb-4 inline-flex items-center gap-2 text-sm transition-colors"
                            >
                                <ArrowLeft className="h-4 w-4" />
                                Back to Home
                            </Link>
                            <h1 className="text-3xl font-bold tracking-tight">All Projects</h1>
                            <p className="text-muted-foreground mt-2">A complete collection of my work</p>
                        </div>
                    </div>
                </div>

                {/* Projects Grid */}
                <div className="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                    <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        {projects.map((project) => (
                            <div
                                key={project.id}
                                className="group border-border bg-card flex flex-col rounded-xl border transition-all hover:shadow-lg"
                            >
                                <div className="from-primary/10 to-primary/5 flex h-48 items-center justify-center rounded-t-xl bg-gradient-to-br">
                                    <Layers className="text-primary/40 h-12 w-12" />
                                </div>
                                <div className="flex flex-1 flex-col p-6">
                                    <div className="mb-2 flex items-center gap-2">
                                        <h3 className="text-lg font-semibold">{project.title}</h3>
                                        {project.featured && (
                                            <span className="bg-primary/10 text-primary rounded-full px-2 py-0.5 text-xs font-medium">Featured</span>
                                        )}
                                    </div>
                                    <p className="text-muted-foreground mb-4 flex-1 text-sm">{project.description}</p>
                                    <div className="mb-4 flex flex-wrap gap-2">
                                        {project.tech_stack?.map((tech) => (
                                            <span key={tech} className="bg-primary/10 text-primary rounded-full px-2 py-0.5 text-xs font-medium">
                                                {tech}
                                            </span>
                                        ))}
                                    </div>
                                    <div className="flex gap-3">
                                        {project.github_url && (
                                            <a
                                                href={project.github_url}
                                                target="_blank"
                                                className="border-border hover:bg-muted flex items-center gap-1.5 rounded-md border px-3 py-1.5 text-sm transition-colors"
                                            >
                                                <Github className="h-4 w-4" />
                                                Code
                                            </a>
                                        )}
                                        {project.live_url && (
                                            <a
                                                href={project.live_url}
                                                target="_blank"
                                                className="bg-primary text-primary-foreground hover:bg-primary/90 flex items-center gap-1.5 rounded-md px-3 py-1.5 text-sm transition-colors"
                                            >
                                                <Globe className="h-4 w-4" />
                                                Live
                                            </a>
                                        )}
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </>
    );
}
