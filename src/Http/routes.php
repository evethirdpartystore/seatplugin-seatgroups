<?php
/**
 * Created by PhpStorm.
 * User: Mutterschiff
 * Date: 11.02.2018
 * Time: 16:57
 */

Route::group([
    'namespace' => 'Herpaderpaldent\Seat\SeatGroups\Http\Controllers',
    'prefix' => 'seatgroups'
    ], function() {

        // General Group of Links open for Everyone
        Route::group([
            'middleware' => 'web'
        ], function (){
            Route::get('/', [
                'as'   => 'seatgroups.index',
                'uses' => 'SeatGroupsController@index'
                ]);
            }
        );
        // Admin Route
        Route::group([
            'middleware' => ['web']
        ], function (){
            Route::get('/{group_id}/edit', [
                'as'   => 'seatgroups.edit',
                'uses' => 'SeatGroupsController@edit'
                ]);

            Route::get('/create', [
                'as' => 'seatgroups.create',
                'uses' => 'SeatGroupsController@create'
                ]);

            Route::post('/{group_id}', [
                'as' => 'seatgroups.update',
                'uses' => 'SeatGroupsController@update'
            ]);
            Route::post('/', [
                'uses' => 'SeatGroupsController@store'
            ]);
            Route::delete('/{group_id}', [
                'as' => 'seatgroups.destroy',
                'uses' => 'SeatGroupsController@destroy'
            ]);
        }

        );
    }
);
