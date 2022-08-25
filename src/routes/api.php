<?php

use :uc:vendor\:uc:package\Http\Controllers\:uc:packageController;

Route::prefix('api/v1')->group(
    function () {
        Route::group(['middleware' => ['auth:sanctum', 'subscribed']],
            function () {
                Route::prefix(':lc:package')->group(
                    function () {
                        Route::get('/', [:uc:packageController::class, 'all']);
                        Route::get('/{id}', [:uc:packageController::class, 'getById']);
                        Route::post('/', [:uc:packageController::class, 'create']);
                        Route::put('/{id}', [:uc:packageController::class, 'update']);
                        Route::delete('/{id}', [:uc:packageController::class, 'delete']);
                    });
            });
    });