<?php

use Illuminate\Support\Facades\Route;


// Project routes no Middleware
Route::get('/', 'ProjectController@home');
Route::get('/projects/{slug}', 'ProjectController@show')->name('projects.show');

//Dashboard routes auth Middleware
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.home');
    Route::get('/projects', 'ProjectController@index')->name('projects');
    Route::get('/users', 'UserController@index')->name('users');
    Route::patch('/users/{id}/update', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}/destroy', 'UserController@destroy')->name('users.destroy');
});

// Admin routes auth & admin Middleware
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/create', 'ProjectController@create')->name('projects.create');
    Route::post('/projects/store', 'ProjectController@store')->name('projects.store');

    Route::get('/trash', 'ProjectController@trash')->name('projects.trash');
    Route::get('/projects/trash/{id}/restore', 'ProjectController@restore')->name('projects.restore');
    Route::delete('/projects/trash/{id}/permDelete', 'ProjectController@permDelete')->name('projects.permDelete');



    Route::get('/projects/{id}/edit', 'ProjectController@edit')->name('projects.edit');
    Route::patch('/projects/{id}/update', 'ProjectController@update')->name('projects.update');
    Route::delete('/projects/{id}/delete', 'ProjectController@delete')->name('projects.delete');

    Route::get('admin', 'DashboardController@admin')->name('admin.index');
    Route::get('admin/projects', 'DashboardController@projects')->name('admin.projects');
});

// Category Routes ------------------------------------------------
Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('categories/create', 'CategoryController@create')->name('categories.create');
Route::post('/categories/store', 'CategoryController@store')->name('categories.store');


Route::get('/categories/{slug}', 'CategoryController@show')->name('categories.show');
Route::get('/categories/{slug}/edit', 'CategoryController@edit')->name('categories.edit');
Route::get('/categories/projects/{slug}', 'CategoryController@noEdit')->name('categories.noEdit');
Route::patch('/categories/{slug}/update', 'CategoryController@update')->name('categories.update');
Route::delete('/categories/{slug}/delete', 'CategoryController@delete')->name('categories.delete');




Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \uniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
