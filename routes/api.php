<?php

use Illuminate\Http\Request;

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

Route::get('/', 'ApiController@show')->name('api.index');
Route::post('/warband', 'WarbandController@index')->name('api.warband');
Route::post('/factorio/server-settings', 'FactorioController@server')->name('api.factorio.server');
Route::get('/factorio/map-settings', 'FactorioController@map')->name('api.factorio.map');
Route::get('/factorio/map-gen-settings', 'FactorioController@gen')->name('api.factorio.mapgen');
Route::get('/minecraft/server.properties', 'MinecraftController@index')->name('api.minecraft.server');
