<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\FacebookPageController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');
    // roles
    Route::resource('roles', RoleController::class)->names([
        'index' => 'midade.users.admin.roles.all',
        'create' => 'midade.users.admin.roles.create',
        'store' => 'midade.users.admin.roles.store',
        'edit' => 'midade.users.admin.roles.edit',
        'update' => 'midade.users.admin.roles.update',
        'destroy' => 'midade.users.admin.roles.destroy',
    ]);
    // users
    Route::resource('users', UserController::class)->names([
        'index' => 'midade.users.admin.users.all',
        'create' => 'midade.users.admin.users.create',
        'store' => 'midade.users.admin.users.store',
        'edit' => 'midade.users.admin.users.edit',
        'update' => 'midade.users.admin.users.update',
        'destroy' => 'midade.users.admin.users.destroy',
    ]);
    // facebook pages
    Route::resource('facebook-pages', FacebookPageController::class)->names([
        'index' => 'midade.facebookpages.admin.facebookpages.all',
        'create' => 'midade.facebookpages.admin.facebookpages.create',
        'store' => 'midade.facebookpages.admin.facebookpages.store',
        'edit' => 'midade.facebookpages.admin.facebookpages.edit',
        'update' => 'midade.facebookpages.admin.facebookpages.update',
        'destroy' => 'midade.facebookpages.admin.facebookpages.destroy',
    ]);
    // facebook pages messages
    Route::resource('facebook-pages', FacebookPageController::class)->names([
        'index' => 'midade.facebookpages.admin.facebookpages.all',
        'create' => 'midade.facebookpages.admin.facebookpages.create',
        'store' => 'midade.facebookpages.admin.facebookpages.store',
        'edit' => 'midade.facebookpages.admin.facebookpages.edit',
        'update' => 'midade.facebookpages.admin.facebookpages.update',
        'destroy' => 'midade.facebookpages.admin.facebookpages.destroy',
    ]);

    Route::get('facebook-pages/{page_id}/conversations', [FacebookPageController::class, 'conversations'])->name('midade.facebookpages.admin.facebookpages.conversations');
    Route::get('facebook-pages/conversations/{conversation_id}/messages', [MessageController::class, 'index'])->name('midade.facebookpages.admin.facebookpages.messages');
    Route::get('facebook-pages/conversations/{conversation_id}/messages', [MessageController::class, 'store'])->name('midade.facebookpages.admin.facebookpages.messages.store');


    #########New Muslims #########
    // teams
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('teams', App\Livewire\Teams\Table\All::class)->name('teams.index');
    });
});
