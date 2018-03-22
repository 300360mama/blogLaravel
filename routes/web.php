<?php



Route::get('/', 'HomeController@index');

Route::get('home/{category?}', 'HomeController@index');
Route::post('home/searchArticle', 'HomeController@search');
Route::get('about', 'AboutController@index');
Route::get('detail/{idArticle?}', 'DetailController@index');
Route::get('contact', 'ContactController@index');




