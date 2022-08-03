<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminsController,
    AliasesController,
    AliasDomainController,
    FetchmailController,
    MailboxesController,
    VirtualController,
    DomainsController,
    DashboardController,
    AuthController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function() {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('sendmail', [DashboardController::class, 'sendmail'])->name('sendmail');
    Route::get('broadcast', [DashboardController::class, 'broadcast'])->name('broadcast');
    Route::get('view-log', [DashboardController::class, 'viewLog'])->name('view-log');
    Route::get('change-password', [DashboardController::class, 'changePassword'])->name('change-password');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('admins')->group(function() {
        Route::get('', [AdminsController::class, 'index'])->name('admins');
        Route::get('create', [AdminsController::class, 'create'])->name('admins.create');
        Route::post('create', [AdminsController::class, 'store'])->name('admins.store');
        Route::get('edit', [AdminsController::class, 'edit'])->name('admins.edit');
        Route::post('update', [AdminsController::class, 'update'])->name('admins.update');
        Route::post('delete', [AdminsController::class, 'delete'])->name('admins.delete');
        Route::get('toggle-active', [AdminsController::class, 'toggleActive'])->name('admins.toggle-active');
    });

    Route::prefix('domains')->group(function() {
        Route::get('', [DomainsController::class, 'index'])->name('domains');
        Route::get('create', [DomainsController::class, 'create'])->name('domains.create');
        Route::post('create', [DomainsController::class, 'store'])->name('domains.store');
        Route::get('edit', [DomainsController::class, 'edit'])->name('domains.edit');
        Route::post('edit', [DomainsController::class, 'update'])->name('domains.update');
        Route::post('delete', [DomainsController::class, 'delete'])->name('domains.delete');
    });

    Route::prefix('virtual')->group(function() {
        Route::get('', [VirtualController::class, 'index'])->name('virtual.index');
    });

    Route::prefix('mailboxes')->group(function() {
        Route::get('create', [MailboxesController::class, 'create'])->name('mailboxes.create');
        Route::post('create', [MailboxesController::class, 'store'])->name('mailboxes.store');
        Route::post('delete', [MailboxesController::class, 'delete'])->name('mailboxes.delete');
    });

    Route::prefix('fetchmail')->group(function() {
        Route::get('', [FetchmailController::class, 'index'])->name('fetchmail.index');
        Route::get('create', [FetchmailController::class, 'create'])->name('fetchmail.create');
    });

    Route::prefix('alias-domain')->group(function() {
        Route::get('create', [AliasDomainController::class, 'create'])->name('alias-domain.create');
        Route::get('edit', [AliasDomainController::class, 'edit'])->name('alias-domain.edit');
        Route::post('create', [AliasDomainController::class, 'store'])->name('alias-domain.store');
    });

    Route::prefix('aliases')->group(function() {
        Route::get('create', [AliasesController::class, 'create'])->name('aliases.create');
        Route::post('create', [AliasesController::class, 'store'])->name('aliases.store');
    });
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
