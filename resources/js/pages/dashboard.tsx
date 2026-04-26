import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';
import type { LucideIcon } from 'lucide-react';
import { ExternalLink, FolderOpen, Mail, MailOpen, Plus, Star } from 'lucide-react';

interface DashboardProps {
    projectsCount: number;
    messagesCount: number;
    unreadMessagesCount: number;
    featuredProjectsCount: number;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

interface StatItem {
    title: string;
    value: number;
    icon: LucideIcon;
    href: string;
    color: string;
    bgColor: string;
}

export default function Dashboard({ projectsCount, messagesCount, unreadMessagesCount, featuredProjectsCount }: DashboardProps) {
    const stats: StatItem[] = [
        {
            title: 'Total Projects',
            value: projectsCount,
            icon: FolderOpen,
            href: route('admin.projects.index'),
            color: 'text-blue-600',
            bgColor: 'bg-blue-50',
        },
        {
            title: 'Featured Projects',
            value: featuredProjectsCount,
            icon: Star,
            href: route('admin.projects.index'),
            color: 'text-amber-600',
            bgColor: 'bg-amber-50',
        },
        {
            title: 'Total Messages',
            value: messagesCount,
            icon: Mail,
            href: route('admin.messages'),
            color: 'text-green-600',
            bgColor: 'bg-green-50',
        },
        {
            title: 'Unread Messages',
            value: unreadMessagesCount,
            icon: MailOpen,
            href: route('admin.messages'),
            color: 'text-red-600',
            bgColor: 'bg-red-50',
        },
    ];

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="flex h-full flex-1 flex-col gap-6 p-4 sm:p-6">
                <div className="flex items-center justify-between">
                    <h1 className="text-2xl font-bold tracking-tight">Dashboard</h1>
                    <Link
                        href={route('admin.projects.create')}
                        className="bg-primary text-primary-foreground hover:bg-primary/90 inline-flex items-center gap-2 rounded-md px-4 py-2 text-sm font-medium transition-colors"
                    >
                        <Plus className="h-4 w-4" />
                        New Project
                    </Link>
                </div>

                <div className="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    {stats.map((stat) => {
                        const IconComponent = stat.icon;
                        return (
                            <Link
                                key={stat.title}
                                href={stat.href}
                                className="border-border bg-card flex items-center gap-4 rounded-xl border p-4 transition-all hover:shadow-md"
                            >
                                <div className={`flex h-12 w-12 items-center justify-center rounded-lg ${stat.bgColor}`}>
                                    <IconComponent className={`h-6 w-6 ${stat.color}`} />
                                </div>
                                <div>
                                    <p className="text-muted-foreground text-sm">{stat.title}</p>
                                    <p className="text-2xl font-bold">{stat.value}</p>
                                </div>
                            </Link>
                        );
                    })}
                </div>

                <div className="grid gap-6 md:grid-cols-2">
                    <div className="border-border bg-card rounded-xl border p-6">
                        <h2 className="mb-4 text-lg font-semibold">Quick Actions</h2>
                        <div className="space-y-3">
                            <Link
                                href={route('admin.projects.create')}
                                className="border-border hover:bg-muted flex items-center justify-between rounded-lg border p-3 transition-colors"
                            >
                                <div className="flex items-center gap-3">
                                    <Plus className="text-primary h-5 w-5" />
                                    <span className="text-sm font-medium">Add New Project</span>
                                </div>
                                <ExternalLink className="text-muted-foreground h-4 w-4" />
                            </Link>
                            <Link
                                href={route('admin.projects.index')}
                                className="border-border hover:bg-muted flex items-center justify-between rounded-lg border p-3 transition-colors"
                            >
                                <div className="flex items-center gap-3">
                                    <FolderOpen className="text-primary h-5 w-5" />
                                    <span className="text-sm font-medium">Manage Projects</span>
                                </div>
                                <ExternalLink className="text-muted-foreground h-4 w-4" />
                            </Link>
                            <Link
                                href={route('admin.messages')}
                                className="border-border hover:bg-muted flex items-center justify-between rounded-lg border p-3 transition-colors"
                            >
                                <div className="flex items-center gap-3">
                                    <Mail className="text-primary h-5 w-5" />
                                    <span className="text-sm font-medium">View Messages</span>
                                </div>
                                <ExternalLink className="text-muted-foreground h-4 w-4" />
                            </Link>
                        </div>
                    </div>

                    <div className="border-border bg-card rounded-xl border p-6">
                        <h2 className="mb-4 text-lg font-semibold">Portfolio Overview</h2>
                        <p className="text-muted-foreground mb-4 text-sm">
                            Welcome to your portfolio admin panel. Here you can manage your projects, view contact messages, and track your
                            portfolio's performance.
                        </p>
                        <div className="bg-muted rounded-lg p-4">
                            <p className="text-sm font-medium">Tip</p>
                            <p className="text-muted-foreground text-sm">
                                Keep your featured projects up to date to make the best impression on visitors.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
