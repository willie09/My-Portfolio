import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft, Check, Clock, Mail, MailOpen, User } from 'lucide-react';

interface ContactMessage {
    id: number;
    name: string;
    email: string;
    subject: string;
    message: string;
    read_at: string | null;
    created_at: string;
}

interface MessagesProps {
    messages: ContactMessage[];
}

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Messages', href: '/admin/messages' },
];

export default function Messages({ messages }: MessagesProps) {
    const { patch } = useForm();

    const handleMarkAsRead = (messageId: number) => {
        patch(route('admin.messages.read', messageId));
    };

    const formatDate = (dateString: string) => {
        return new Date(dateString).toLocaleDateString('en-US', {
            month: 'short',
            day: 'numeric',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
        });
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Messages" />
            <div className="flex h-full flex-1 flex-col gap-6 p-4 sm:p-6">
                <div className="flex items-center gap-4">
                    <Link href={route('dashboard')} className="border-border hover:bg-muted rounded-md border p-2 transition-colors">
                        <ArrowLeft className="h-4 w-4" />
                    </Link>
                    <div>
                        <h1 className="text-2xl font-bold tracking-tight">Messages</h1>
                        <p className="text-muted-foreground text-sm">
                            {messages.filter((m) => !m.read_at).length} unread of {messages.length} total
                        </p>
                    </div>
                </div>

                {messages.length === 0 ? (
                    <div className="border-border bg-card flex flex-1 items-center justify-center rounded-xl border p-12">
                        <div className="text-center">
                            <Mail className="text-muted-foreground/50 mx-auto h-12 w-12" />
                            <h3 className="mt-4 text-lg font-semibold">No messages yet</h3>
                            <p className="text-muted-foreground mt-2 text-sm">
                                When visitors contact you through your portfolio, messages will appear here.
                            </p>
                        </div>
                    </div>
                ) : (
                    <div className="space-y-4">
                        {messages.map((message) => (
                            <div
                                key={message.id}
                                className={`rounded-xl border p-6 transition-all ${
                                    message.read_at ? 'border-border bg-card' : 'border-primary/20 bg-primary/5'
                                }`}
                            >
                                <div className="flex items-start justify-between gap-4">
                                    <div className="flex items-start gap-4">
                                        <div
                                            className={`flex h-10 w-10 shrink-0 items-center justify-center rounded-full ${
                                                message.read_at ? 'bg-muted' : 'bg-primary/10'
                                            }`}
                                        >
                                            {message.read_at ? (
                                                <MailOpen className="text-muted-foreground h-5 w-5" />
                                            ) : (
                                                <Mail className="text-primary h-5 w-5" />
                                            )}
                                        </div>
                                        <div>
                                            <div className="flex flex-wrap items-center gap-3">
                                                <h3 className="font-semibold">{message.subject}</h3>
                                                {!message.read_at && (
                                                    <span className="bg-primary text-primary-foreground rounded-full px-2 py-0.5 text-xs font-medium">
                                                        New
                                                    </span>
                                                )}
                                            </div>
                                            <div className="text-muted-foreground mt-1 flex items-center gap-4 text-sm">
                                                <span className="flex items-center gap-1.5">
                                                    <User className="h-3.5 w-3.5" />
                                                    {message.name}
                                                </span>
                                                <span>{message.email}</span>
                                                <span className="flex items-center gap-1.5">
                                                    <Clock className="h-3.5 w-3.5" />
                                                    {formatDate(message.created_at)}
                                                </span>
                                            </div>
                                            <p className="mt-3 text-sm leading-relaxed">{message.message}</p>
                                        </div>
                                    </div>
                                    {!message.read_at && (
                                        <button
                                            onClick={() => handleMarkAsRead(message.id)}
                                            className="border-border hover:bg-muted flex shrink-0 items-center gap-1.5 rounded-md border px-3 py-1.5 text-sm transition-colors"
                                        >
                                            <Check className="h-4 w-4" />
                                            Mark read
                                        </button>
                                    )}
                                </div>
                            </div>
                        ))}
                    </div>
                )}
            </div>
        </AppLayout>
    );
}
