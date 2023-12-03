<?php

Route::group([
    'namespace' => 'CryptaEve\Seat\SquadSync\Http\Controllers',
    'middleware' => ['web', 'auth'],
    'prefix' => 'squadsync'
], function () {
    
    Route::get('/configure', [
        'as'   => 'cryptasquadsync::configure',
        'uses' => 'SyncController@getConfigureView',
        'middleware' => 'can:squadsync.edit'
    ]);

    Route::post('/postsyncnew', [
        'as'   => 'cryptasquadsync::createSync',
        'uses' => 'SyncController@postNewSync',
        'middleware' => 'can:squadsync.edit'
    ]);

    Route::get('/delsyncbyid/{id}', [
        'as'   => 'cryptasquadsync::deleteSync',
        'uses' => 'SyncController@deleteSyncById',
        'middleware' => 'can:squadsync.edit'
    ]);

    Route::get('/about', [
        'as'   => 'cryptasquadsync::about',
        'uses' => 'SyncController@getAboutView',
        'middleware' => 'can:squadsync.edit'
    ]);

    Route::get('/instructions', [
        'as'   => 'cryptasquadsync::instructions',
        'uses' => 'SyncController@getInstructionsView',
        'middleware' => 'can:squadsync.edit'
    ]);
    
});
