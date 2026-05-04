import { type SharedData } from '@/types';
import { Head, Link, useForm, usePage } from '@inertiajs/react';
import { ChevronDown, Code2, ExternalLink, Github, Globe, Layers, Mail, Menu, Shield, X, Zap } from 'lucide-react';
import { useState } from 'react';

interface WelcomeProps {
    featuredProjects: Array<{
        id: number;
        title: string;
        description: string;
        tech_stack: string[];
        github_url: string | null;
        live_url: string | null;
        image: string | null;
    }>;
}

const skills = [
    { name: 'Laravel', category: 'Backend' },
    { name: 'React', category: 'Frontend' },
    { name: 'TypeScript', category: 'Frontend' },
    { name: 'Tailwind CSS', category: 'Frontend' },
    { name: 'Inertia.js', category: 'Frontend' },
    { name: 'PHP', category: 'Backend' },
    { name: 'MySQL', category: 'Database' },
    { name: 'SQLite', category: 'Database' },
    { name: 'Git', category: 'Tools' },
    { name: 'Docker', category: 'DevOps' },
    { name: 'REST APIs', category: 'Backend' },
    { name: 'Testing', category: 'Quality' },
];

const services = [
    {
        icon: Code2,
        title: 'Full-Stack Development',
        description: 'End-to-end web application development using Laravel and React with modern architecture patterns.',
    },
    {
        icon: Layers,
        title: 'API Design',
        description: 'Building robust RESTful APIs with proper authentication, documentation, and versioning strategies.',
    },
    {
        icon: Zap,
        title: 'Performance Optimization',
        description: 'Analyzing and improving application speed through caching, database optimization, and code refactoring.',
    },
    {
        icon: Shield,
        title: 'Security Hardening',
        description: 'Implementing security best practices including authentication, authorization, and data protection.',
    },
];

export default function Welcome({ featuredProjects }: WelcomeProps) {
    const { auth } = usePage<SharedData>().props;
    const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        subject: '',
        message: '',
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        post(route('contact.store'), {
            onSuccess: () => reset(),
        });
    };

    const scrollToSection = (id: string) => {
        const element = document.getElementById(id);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
        }
        setMobileMenuOpen(false);
    };

    return (
        <>
            <Head title="Portfolio">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
            </Head>

            {/* Navigation */}
            <nav className="border-border/50 bg-background/80 fixed top-0 right-0 left-0 z-50 border-b backdrop-blur-md">
                <div className="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                    <Link href="/" className="text-xl font-bold tracking-tight">
                        Portfolio
                    </Link>

                    {/* Desktop Nav */}
                    <div className="hidden items-center gap-8 md:flex">
                        <button
                            onClick={() => scrollToSection('about')}
                            className="text-muted-foreground hover:text-foreground text-sm font-medium transition-colors"
                        >
                            About
                        </button>
                        <button
                            onClick={() => scrollToSection('skills')}
                            className="text-muted-foreground hover:text-foreground text-sm font-medium transition-colors"
                        >
                            Skills
                        </button>
                        <button
                            onClick={() => scrollToSection('projects')}
                            className="text-muted-foreground hover:text-foreground text-sm font-medium transition-colors"
                        >
                            Projects
                        </button>
                        <button
                            onClick={() => scrollToSection('contact')}
                            className="text-muted-foreground hover:text-foreground text-sm font-medium transition-colors"
                        >
                            Contact
                        </button>
                        {auth.user ? (
                            <Link
                                href={route('dashboard')}
                                className="bg-primary text-primary-foreground hover:bg-primary/90 rounded-md px-4 py-2 text-sm font-medium transition-colors"
                            >
                                Dashboard
                            </Link>
                        ) : (
                            <Link
                                href={route('login')}
                                className="bg-primary text-primary-foreground hover:bg-primary/90 rounded-md px-4 py-2 text-sm font-medium transition-colors"
                            >
                                Log in
                            </Link>
                        )}
                    </div>

                    {/* Mobile Menu Button */}
                    <button className="md:hidden" onClick={() => setMobileMenuOpen(!mobileMenuOpen)}>
                        {mobileMenuOpen ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
                    </button>
                </div>

                {/* Mobile Menu */}
                {mobileMenuOpen && (
                    <div className="border-border/50 bg-background border-t px-4 py-4 md:hidden">
                        <div className="flex flex-col gap-4">
                            <button onClick={() => scrollToSection('about')} className="text-muted-foreground text-left text-sm font-medium">
                                About
                            </button>
                            <button onClick={() => scrollToSection('skills')} className="text-muted-foreground text-left text-sm font-medium">
                                Skills
                            </button>
                            <button onClick={() => scrollToSection('projects')} className="text-muted-foreground text-left text-sm font-medium">
                                Projects
                            </button>
                            <button onClick={() => scrollToSection('contact')} className="text-muted-foreground text-left text-sm font-medium">
                                Contact
                            </button>
                            {auth.user ? (
                                <Link
                                    href={route('dashboard')}
                                    className="bg-primary text-primary-foreground rounded-md px-4 py-2 text-center text-sm font-medium"
                                >
                                    Dashboard
                                </Link>
                            ) : (
                                <Link
                                    href={route('login')}
                                    className="bg-primary text-primary-foreground rounded-md px-4 py-2 text-center text-sm font-medium"
                                >
                                    Log in
                                </Link>
                            )}
                        </div>
                    </div>
                )}
            </nav>

            {/* Hero Section */}
            <section className="relative flex min-h-screen items-center justify-center px-4 pt-20">
                <div className="mx-auto max-w-4xl text-center">
                    <div className="border-border bg-muted mb-6 inline-flex items-center rounded-full border px-3 py-1 text-sm">
                        <span className="mr-2 inline-block h-2 w-2 animate-pulse rounded-full bg-green-500"></span>
                        Available for freelance work
                    </div>
                    <h1 className="mb-6 text-4xl font-bold tracking-tight sm:text-6xl lg:text-7xl">
                        Building digital
                        <span className="text-primary"> experiences </span>
                        that matter
                    </h1>
                    <p className="text-muted-foreground mx-auto mb-10 max-w-2xl text-lg sm:text-xl">
                        Full-stack developer crafting robust, scalable web applications with Laravel and React. Passionate about clean code, user
                        experience, and solving real-world problems.
                    </p>
                    <div className="flex flex-col items-center justify-center gap-4 sm:flex-row">
                        <button
                            onClick={() => scrollToSection('projects')}
                            className="bg-primary text-primary-foreground hover:bg-primary/90 rounded-md px-8 py-3 text-sm font-medium transition-colors"
                        >
                            View My Work
                        </button>
                        <button
                            onClick={() => scrollToSection('contact')}
                            className="border-border hover:bg-muted rounded-md border px-8 py-3 text-sm font-medium transition-colors"
                        >
                            Get in Touch
                        </button>
                    </div>
                    <div className="mt-16 flex justify-center">
                        <button onClick={() => scrollToSection('about')} className="animate-bounce">
                            <ChevronDown className="text-muted-foreground h-6 w-6" />
                        </button>
                    </div>
                </div>
            </section>

            {/* About Section */}
            <section id="about" className="px-4 py-24 sm:px-6 lg:px-8">
                <div className="mx-auto max-w-7xl">
                    <div className="grid items-center gap-12 lg:grid-cols-2">
                        <div>
                            <h2 className="mb-4 text-3xl font-bold tracking-tight sm:text-4xl">About Me</h2>
                            <div className="bg-primary mb-6 h-1 w-20 rounded-full"></div>
                            <p className="text-muted-foreground mb-4">
                                I'm a passionate full-stack developer with expertise in building modern web applications. My journey in software
                                development started with a curiosity for how things work on the web, which evolved into a career focused on creating
                                impactful digital solutions.
                            </p>
                            <p className="text-muted-foreground mb-6">
                                I specialize in the Laravel ecosystem combined with React and TypeScript, delivering type-safe, performant
                                applications with exceptional user experiences. Whether it's a complex SaaS platform or a sleek portfolio site, I
                                bring the same dedication to quality and attention to detail.
                            </p>
                            <div className="flex gap-4">
                                <a
                                    href="https://github.com"
                                    target="_blank"
                                    className="border-border hover:bg-muted rounded-md border p-3 transition-colors"
                                >
                                    <Github className="h-5 w-5" />
                                </a>
                                <a href="mailto:hello@example.com" className="border-border hover:bg-muted rounded-md border p-3 transition-colors">
                                    <Mail className="h-5 w-5" />
                                </a>
                            </div>
                        </div>
                        <div className="grid gap-6 sm:grid-cols-2">
                            {services.map((service) => (
                                <div key={service.title} className="border-border bg-card rounded-xl border p-6 transition-all hover:shadow-lg">
                                    <service.icon className="text-primary mb-4 h-8 w-8" />
                                    <h3 className="mb-2 font-semibold">{service.title}</h3>
                                    <p className="text-muted-foreground text-sm">{service.description}</p>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </section>

            {/* Skills Section */}
            <section id="skills" className="bg-muted/50 px-4 py-24 sm:px-6 lg:px-8">
                <div className="mx-auto max-w-7xl">
                    <div className="mb-12 text-center">
                        <h2 className="mb-4 text-3xl font-bold tracking-tight sm:text-4xl">Technical Skills</h2>
                        <p className="text-muted-foreground mx-auto max-w-2xl">
                            A comprehensive toolkit built over years of hands-on development experience
                        </p>
                    </div>
                    <div className="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                        {['Backend', 'Frontend', 'Database', 'Tools'].map((category) => (
                            <div key={category} className="border-border bg-background rounded-xl border p-6">
                                <h3 className="text-primary mb-4 font-semibold">{category}</h3>
                                <div className="flex flex-wrap gap-2">
                                    {skills
                                        .filter((s) => s.category === category)
                                        .map((skill) => (
                                            <span key={skill.name} className="bg-muted rounded-full px-3 py-1 text-sm font-medium">
                                                {skill.name}
                                            </span>
                                        ))}
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Projects Section */}
            <section id="projects" className="px-4 py-24 sm:px-6 lg:px-8">
                <div className="mx-auto max-w-7xl">
                    <div className="mb-12 flex items-end justify-between">
                        <div>
                            <h2 className="mb-4 text-3xl font-bold tracking-tight sm:text-4xl">Featured Projects</h2>
                            <p className="text-muted-foreground max-w-2xl">
                                A selection of projects that showcase my skills and passion for development
                            </p>
                        </div>
                        <Link href={route('projects')} className="text-primary hidden items-center gap-2 text-sm font-medium hover:underline sm:flex">
                            View All Projects
                            <ExternalLink className="h-4 w-4" />
                        </Link>
                    </div>

                    <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        {featuredProjects.map((project) => (
                            <div
                                key={project.id}
                                className="group border-border bg-card flex flex-col rounded-xl border transition-all hover:shadow-lg"
                            >
                                {project.image ? (
                                    <img
                                        src={project.image.startsWith('http') ? project.image : `/${project.image}`}
                                        alt={project.title}
                                        className="h-48 w-full rounded-t-xl object-cover"
                                    />
                                ) : (
                                    <div className="from-primary/10 to-primary/5 flex h-48 items-center justify-center rounded-t-xl bg-gradient-to-br">
                                        <Layers className="text-primary/40 h-12 w-12" />
                                    </div>
                                )}
                                <div className="flex flex-1 flex-col p-6">
                                    <h3 className="mb-2 text-lg font-semibold">{project.title}</h3>
                                    <p className="text-muted-foreground mb-4 line-clamp-3 flex-1 text-sm">{project.description}</p>
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

                    <div className="mt-8 text-center sm:hidden">
                        <Link href={route('projects')} className="text-primary inline-flex items-center gap-2 text-sm font-medium hover:underline">
                            View All Projects
                            <ExternalLink className="h-4 w-4" />
                        </Link>
                    </div>
                </div>
            </section>

            {/* Contact Section */}
            <section id="contact" className="bg-muted/50 px-4 py-24 sm:px-6 lg:px-8">
                <div className="mx-auto max-w-7xl">
                    <div className="grid gap-12 lg:grid-cols-2">
                        <div>
                            <h2 className="mb-4 text-3xl font-bold tracking-tight sm:text-4xl">Let's Work Together</h2>
                            <p className="text-muted-foreground mb-8">
                                Have a project in mind or want to discuss opportunities? I'd love to hear from you. Fill out the form and I'll get
                                back to you as soon as possible.
                            </p>
                            <div className="space-y-4">
                                <div className="flex items-center gap-4">
                                    <div className="bg-primary/10 flex h-10 w-10 items-center justify-center rounded-full">
                                        <Mail className="text-primary h-5 w-5" />
                                    </div>
                                    <div>
                                        <p className="text-sm font-medium">Email</p>
                                        <p className="text-muted-foreground text-sm">hello@example.com</p>
                                    </div>
                                </div>
                                <div className="flex items-center gap-4">
                                    <div className="bg-primary/10 flex h-10 w-10 items-center justify-center rounded-full">
                                        <Github className="text-primary h-5 w-5" />
                                    </div>
                                    <div>
                                        <p className="text-sm font-medium">GitHub</p>
                                        <p className="text-muted-foreground text-sm">github.com/example</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form onSubmit={handleSubmit} className="border-border bg-background space-y-4 rounded-xl border p-6 sm:p-8">
                            <div className="grid gap-4 sm:grid-cols-2">
                                <div>
                                    <label htmlFor="name" className="mb-2 block text-sm font-medium">
                                        Name
                                    </label>
                                    <input
                                        id="name"
                                        type="text"
                                        value={data.name}
                                        onChange={(e) => setData('name', e.target.value)}
                                        className="border-border bg-background focus:border-primary focus:ring-primary w-full rounded-md border px-3 py-2 text-sm outline-none focus:ring-1"
                                        placeholder="Your name"
                                    />
                                    {errors.name && <p className="mt-1 text-xs text-red-500">{errors.name}</p>}
                                </div>
                                <div>
                                    <label htmlFor="email" className="mb-2 block text-sm font-medium">
                                        Email
                                    </label>
                                    <input
                                        id="email"
                                        type="email"
                                        value={data.email}
                                        onChange={(e) => setData('email', e.target.value)}
                                        className="border-border bg-background focus:border-primary focus:ring-primary w-full rounded-md border px-3 py-2 text-sm outline-none focus:ring-1"
                                        placeholder="your@email.com"
                                    />
                                    {errors.email && <p className="mt-1 text-xs text-red-500">{errors.email}</p>}
                                </div>
                            </div>
                            <div>
                                <label htmlFor="subject" className="mb-2 block text-sm font-medium">
                                    Subject
                                </label>
                                <input
                                    id="subject"
                                    type="text"
                                    value={data.subject}
                                    onChange={(e) => setData('subject', e.target.value)}
                                    className="border-border bg-background focus:border-primary focus:ring-primary w-full rounded-md border px-3 py-2 text-sm outline-none focus:ring-1"
                                    placeholder="What's this about?"
                                />
                                {errors.subject && <p className="mt-1 text-xs text-red-500">{errors.subject}</p>}
                            </div>
                            <div>
                                <label htmlFor="message" className="mb-2 block text-sm font-medium">
                                    Message
                                </label>
                                <textarea
                                    id="message"
                                    rows={5}
                                    value={data.message}
                                    onChange={(e) => setData('message', e.target.value)}
                                    className="border-border bg-background focus:border-primary focus:ring-primary w-full rounded-md border px-3 py-2 text-sm outline-none focus:ring-1"
                                    placeholder="Tell me about your project..."
                                />
                                {errors.message && <p className="mt-1 text-xs text-red-500">{errors.message}</p>}
                            </div>
                            <button
                                type="submit"
                                disabled={processing}
                                className="bg-primary text-primary-foreground hover:bg-primary/90 w-full rounded-md px-4 py-3 text-sm font-medium transition-colors disabled:opacity-50"
                            >
                                {processing ? 'Sending...' : 'Send Message'}
                            </button>
                        </form>
                    </div>
                </div>
            </section>

            {/* Footer */}
            <footer className="border-border border-t px-4 py-8 sm:px-6 lg:px-8">
                <div className="mx-auto flex max-w-7xl flex-col items-center justify-between gap-4 sm:flex-row">
                    <p className="text-muted-foreground text-sm">&copy; {new Date().getFullYear()} Portfolio. Built with Laravel & React.</p>
                    <div className="flex gap-4">
                        <a href="https://github.com" target="_blank" className="text-muted-foreground hover:text-foreground transition-colors">
                            <Github className="h-5 w-5" />
                        </a>
                        <a href="mailto:hello@example.com" className="text-muted-foreground hover:text-foreground transition-colors">
                            <Mail className="h-5 w-5" />
                        </a>
                    </div>
                </div>
            </footer>
        </>
    );
}
