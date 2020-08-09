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

    Route::post('/postsyncnew', [
        'as'   => 'squadsync.createSync',
        'uses' => 'SyncController@postNewSync',
        'middleware' => 'can:squadsync.edit'
    ]);

    Route::get('/delsyncbyid/{id}', [
        'as'   => 'squadsync.deleteSync',
        'uses' => 'SyncController@deleteSyncById',
        'middleware' => 'can:squadsync.edit'
    ]);

    Route::get('/about', [
        'as'   => 'squadsync.about',
        'uses' => 'SyncController@getAboutView',
        'middleware' => 'can:squadsync.edit'
    ]);

    Route::get('/instructions', [
        'as'   => 'squadsync.instructions',
        'uses' => 'SyncController@getInstructionsView',
        'middleware' => 'can:squadsync.edit'
    ]);
    
});
