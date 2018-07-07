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

/**My first projec**/
Route::get('/', function () {
    return view('welcome');
});
Route::get('form', 'StudentsController@studentForm');

/*Here insert is routing name and neww is name to display in url .You can give any name 
instead of neww whichever you want to display */
Route::post('newStudentForm', 'StudentsController@store')->name('insert');

Route::get('view', 'StudentsController@view');
Route::get('edit/{id}', 'StudentsController@edit');
Route::post('update/{id}', 'StudentsController@update');
Route::get('delete/{id}', 'StudentsController@delete');