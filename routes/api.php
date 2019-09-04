<?php

use Illuminate\Http\Request;
use App\User;

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

/**
 * URL Pattern Host/api/route_name
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * EVENTS
 */
Route::get('/events', 'EventsController@index')->name('events');

/**TEsting */
Route::post('/applogin', function () {
    $users = User::all();
    return $users;
});

