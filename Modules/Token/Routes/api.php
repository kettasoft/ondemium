<?php

use Modules\Token\Http\Controllers\TokenController;

Route::group(['middleware' => ['auth:sanctum', 'active', 'doctor'], 'prefix' => 'tokens'], function () {
    Route::controller('TokenController')->group(function () {
        Route::post('create', 'create');
        Route::put('account/{account}/t/{myToken}/update', 'update')->scopeBindings();
        Route::delete('account/{account}/t/{myToken}/delete', 'delete')->scopeBindings();
        Route::get('show', 'show');
    });

    Route::controller('AgentController')->group(function () {
        Route::post('{token}/agent/{agent}/block', 'block')->scopeBindings();
        Route::delete('{myToken}/agent/{agent}/cmode', 'delete');
        Route::post('{token}/use', 'use');
        Route::post('unuse', 'unuse');
    });
});

// api/tokens/2/agent/4/deactivate