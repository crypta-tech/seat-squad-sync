<?php

Route::group([
    'namespace' => 'CryptaEve\Seat\SquadSync\Http\Controllers',
    'middleware' => ['web', 'auth'],
    'prefix' => 'squadsync'
], function () {
    
    Route::get('/configure', [
        'as'   => 'squadsync.configure',
        'uses' => 'SyncController@getConfigureView',
        'middleware' => 'can:squadsync.edit'
    ]);

    Route::get('/about', [
        'as'   => 'squadsync.about',
        'uses' => 'SyncController@getAboutView',
        'middleware' => 'can:squadsync.edit'
    ]);
    
});
