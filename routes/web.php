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

/**My first project**/
Route::get('/', function () {
    return view('welcome');
});
Route::get('form', 'StudentsController@studentForm');

/*Here insert is routing name and neww is name to display in url .You can give any name 
instead of neww whichever you want to display 

 * you have to use route instead of URL::to for naming routes in view file otherwise error 
 * would be generated sorry page looking u r is not found*/
Route::post('newStudentForm', 'StudentsController@store')->name('insert');

/*
 * if want to redirect without using controller bcz it is already defined
 * make sure csrf field is there otherwise it will give error ur session has expired.
 * here when insert will come then it will go to view which is called via controller
 * already defined.
 *  to use URL::to() method
 */
//Route::redirect('insert', 'view');
Route::get('view', 'StudentsController@view');
Route::get('edit/{id}', 'StudentsController@edit');

/*
 * u can put parameter at any position
 */
//Route::get('editall/abc/{id}', 'StudentsController@edit')->name('edit');
//Route::get('editall/{id}/abc', 'StudentsController@edit')->name('edit');
Route::post('update/{id}', 'StudentsController@update');
Route::get('delete/{id}', 'StudentsController@delete');

/*
 * resource example
 */
//Route::resource('abc','Hellos');