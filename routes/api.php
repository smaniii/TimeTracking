<?php

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

Route::post('authenticate', 'AuthenticateController@authenticate');
Route::get('projects', function(){
    $projects = [
        [
            "Id" => 1,
            "name" => "P0",
            "billableHours" => 10,
            "cap" => 20,
        ],
        [
            "Id" => 2,
            "name" => "P1",
            "billableHours" => 10,
            "cap" => 0,
        ],
        [
            "Id" => 3,
            "name" => "P2",
            "billableHours" => 30,
            "cap" => 20
        ],
    ];
    return $projects;
}
);


Route::group(['middleware' => 'jwt.auth'], function()
{
    Route::get('user', 'UserController@show');
    Route::post('user/profile/update', 'UserController@updateProfile');
    Route::post('user/password/update', 'UserController@updatePassword');
});
