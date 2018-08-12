<?php


// Blog Routes
Route::get('/', 'BlogController@index')->name('blog_all');
Route::get('/blog/{category?}', 'BlogController@index')->name('blog_all');
Route::get('/detail/{idArticle?}', 'BlogController@detail')->name('blog_detail');
Route::get('/about', 'AboutController@index')->name('blog_about');

Route::get('contact', 'ContactController@index')->name('blog_contact');
Route::get('/gallery', 'GalleryController@showAlbums');
Route::get('/gallery/{album}', 'GalleryController@showPhotos');

// Admin Routes
Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/{table}/read', 'AdminController@read')->name('admin_read');
Route::get('/admin/{table}/update/{row_id?}', 'AdminController@update')->name('admin_update');
Route::get('/admin/{table}/delete/{row_id?}', 'AdminController@delete')->name('admin_delete');
Route::get('/admin/add/{table}', 'AdminController@add')->name('admin_add');
Route::post('/admin/save/{table}/{id}', 'AdminController@save')->name('save');
Route::post('/admin/insert/{table}', 'AdminController@insert')->name('insert');
