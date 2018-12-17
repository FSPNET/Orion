<?php

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

Route::get('/', function () {
    return response()->json(['message' => 'hi']);
});

Route::get('/warband', 'WarbandController@index');
Route::get('/factorio/server-settings', 'FactorioController@server');
Route::get('/factorio/map-settings', 'FactorioController@map');
Route::get('/factorio/map-gen-settings', 'FactorioController@gen');
Route::get('/minecraft/server.properties', 'MinecraftController@index');
