<?php

use Illuminate\Support\Facades\Route;

Route::get('export', 'MyController@export')->name('export');
Route::get('importExportView', 'MyController@importExportView');
Route::post('import', 'MyController@import')->name('import');

Route::get('/','CongregationController@importExport')->name('home');
Route::get('getUsers/index-sorting', 'CongregationController@sort');
Route::get('filter', 'CongregationController@indexFiltering');
Route::any('filters', 'CongregationController@filters')->name('filters');
Route::get('users/index-datatables', 'CongregationController@indexDatatables');
Route::get('userDataSource', 'CongregationController@userDataSource');
Route::get('index', ['uses'=> 'RenderController@index','as'=>'users']);
Route::get('get', ['uses'=> 'RenderController@get','as'=>'users']);
Route::post('getAll','RenderController@send')->name('getAll');
Route::get('edit/{id}','CongregationController@edit')->name('edit');
Route::put('edit/{id}/{edit?}','CongregationController@edit')->name('edit');
Route::delete('delete/{id}', 'CongregationController@delete')->name('delete');


Route::post('importCongregation','CongregationController@import')->name('importCongregation');
Route::get('exportCongregation','CongregationController@export')->name('exportCongregation');

Route::get('getUsers','CongregationController@showAll');
Route::post('send','SendSmsController@sendSms')->name('send');

Route::get('/ss', 'ChurchUser@importExportView');
Route::post('importUser', 'ChurchUser@import')->name('importUser');
Route::post('read', 'SendSmsController@import');
// Route::post('read', 'SendSmsController@read')->name('read');

//student
Route::get('students',['uses'=> 'StudentController@index', 'as'=>'student-list']);

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@getAll')->name('home');
Route::get('/upload', 'HomeController@index')->name('upload');
Route::get('sendMessage', 'SendSmsController@addMessage')->name('sendMessage');
Route::get('contact', 'SendSmsController@addContact')->name('contact');
Route::post('book', 'SendSmsController@userBooking')->name('book');
Route::get('getAll', 'HomeController@getAll')->name('congregation');
Route::post('send_message', 'SendSmsController@getContacts');
