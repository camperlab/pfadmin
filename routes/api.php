<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    MailboxesController,
    DomainsController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'token', 'prefix' => 'v1'], function() {

    Route::prefix('mailboxes')->group(function() {
        Route::get('', [MailboxesController::class, 'index']);
        Route::get('show', [MailboxesController::class, 'show']);
        Route::post('', [MailboxesController::class, 'store']);
        Route::post('update', [MailboxesController::class, 'update']);
        Route::delete('delete', [MailboxesController::class, 'destroy']);
    });

    Route::prefix('domains')->group(function() {
        Route::get('', [DomainsController::class, 'index'])->name('domains.index');
    });
});

