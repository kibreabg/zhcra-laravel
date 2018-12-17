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
    return view('welcome');
});

//Resource routes
Route::resources([
    '/api/artguidelines' => 'ArtGuidelineController',
    '/api/guidelines' => 'GuidelineController',
    '/api/memos' => 'MemoController',
    '/api/quickaccesstools' => 'QuickAccessToolController'
]);

//Upload routes
Route::post('/api/quickaccesstools/upload', 'QuickAccessToolController@upload');
Route::post('/api/memos/upload', 'MemoController@upload');
Route::post('/api/guidelines/upload', 'GuidelineController@upload');
Route::post('/api/artguidelines/upload', 'ArtGuidelineController@upload');


