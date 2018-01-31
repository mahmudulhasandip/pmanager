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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);



Route::middleware(['auth'])->group(function () {
    Route::resource('companies', 'CompaniesController');
    Route::get('/projects/create/{company_id?}', [
        'as' => 'projects.create',
        'uses' => 'ProjectsController@create'
    ]);
    Route::resource('projects', 'ProjectsController');
    Route::resource('roles', 'RolesController');
    Route::resource('tasks', 'TasksController');
    Route::resource('users', 'UsersController');
    Route::resource('comments', 'CommentsController');
});


