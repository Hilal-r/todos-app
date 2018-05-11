<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});


Route::get('/todos', array('uses' => 'TodosController@index'));

Route::post('/todos', array('before' => 'filterData','as' => 'save', 'uses' => 'TodosController@store'));
Route::put('/todos/{id}', array('before' => 'filterData', 'as' => 'update', 'uses' => 'TodosController@update'));
Route::delete('/todos/{id}', array('as' => 'delete', 'uses' => 'TodosController@destroy'));
