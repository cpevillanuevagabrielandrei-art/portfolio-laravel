<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

// ===================== PUBLIC PORTFOLIO =====================

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [PortfolioController::class, 'contact'])->name('portfolio.contact');

// ===================== ADMIN AUTH =====================

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        // Settings
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');

        // Projects
        Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
        Route::get('/projects/create', [AdminController::class, 'createProject'])->name('projects.create');
        Route::post('/projects', [AdminController::class, 'storeProject'])->name('projects.store');
        Route::get('/projects/{project}/edit', [AdminController::class, 'editProject'])->name('projects.edit');
        Route::put('/projects/{project}', [AdminController::class, 'updateProject'])->name('projects.update');
        Route::delete('/projects/{project}', [AdminController::class, 'destroyProject'])->name('projects.destroy');

        // Skills
        Route::get('/skills', [AdminController::class, 'skills'])->name('skills');
        Route::post('/skill-categories', [AdminController::class, 'storeSkillCategory'])->name('skill-categories.store');
        Route::put('/skill-categories/{category}', [AdminController::class, 'updateSkillCategory'])->name('skill-categories.update');
        Route::delete('/skill-categories/{category}', [AdminController::class, 'destroySkillCategory'])->name('skill-categories.destroy');
        Route::post('/skills', [AdminController::class, 'storeSkill'])->name('skills.store');
        Route::put('/skills/{skill}', [AdminController::class, 'updateSkill'])->name('skills.update');
        Route::delete('/skills/{skill}', [AdminController::class, 'destroySkill'])->name('skills.destroy');

        // Messages
        Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
        Route::get('/messages/{message}', [AdminController::class, 'showMessage'])->name('messages.show');
        Route::delete('/messages/{message}', [AdminController::class, 'destroyMessage'])->name('messages.destroy');
    });
});
