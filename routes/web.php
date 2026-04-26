<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Models\ContactMessage;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'featuredProjects' => Project::where('featured', true)->orderBy('display_order')->get(),
    ]);
})->name('home');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard', [
            'projectsCount' => Project::count(),
            'messagesCount' => ContactMessage::count(),
            'unreadMessagesCount' => ContactMessage::whereNull('read_at')->count(),
            'featuredProjectsCount' => Project::where('featured', true)->count(),
        ]);
    })->name('dashboard');

    Route::get('/admin/projects', function () {
        return view('admin.projects.index', [
            'projects' => Project::orderBy('display_order')->get(),
        ]);
    })->name('admin.projects.index');

    Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    Route::get('/admin/messages', [ContactController::class, 'index'])->name('admin.messages');
    Route::patch('/admin/messages/{contactMessage}/read', [ContactController::class, 'markAsRead'])->name('admin.messages.read');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

