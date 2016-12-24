<?php
Route::get('/verify/{token}/{id}', 'Auth\RegisterController@verify_register');

Auth::routes();

//============== Admin Panel ==========
Route::get('/admin', 'AdminController@index');

Route::post('/admin', 'AdminController@tagStore');
Route::post('/admin/tag-jual', 'AdminController@tagJualStore');

Route::post('/admin/{id}/update', 'AdminController@tagUpdate');
Route::post('/admin/tag-jual/{id}/update', 'AdminController@tagJualUpdate');

Route::get('/admin/{id}/destroy', 'AdminController@tagDestroy');
Route::get('/admin/tag-jual/{id}/destroy', 'AdminController@tagJualDestroy');
//========== end admin panel ========
Route::get('/search/threads', 'SearchController@index');

Route::get('/', 'HomeController@index');

Route::get('/threads/mythreads', 'ThreadController@mine');

Route::get('/barang-di-jual/mythreads', 'JualController@minejual');

Route::get('/threads/create', 'ThreadController@create');//->name('threads.create');// untuk apa belum tau
Route::post('/threads/create', 'ThreadController@store');

Route::get('/threads', 'ThreadController@index');
Route::get('/threads/{slug}', 'ThreadController@show');

Route::get('/threads/{slug}/edit', 'ThreadController@edit')->name('threads.edit');// untuk memberi nama kalau mau ke threads.edit
Route::post('/threads/{slug}/edit', 'ThreadController@update');

Route::get('/tags/{slug}', 'ThreadController@tag')->name('threads.tag');

Route::get('/threads/{id}/delete', 'ImageController@destroyimgthreads');

Route::post('/comment/{slug}','CommentController@store');

Route::get('/comment/{id}/edit', 'CommentController@edit');
Route::post('/comment/{id}/edit', 'CommentController@update');

Route::get('/comment/{id}/delete', 'ImageController@deleteimgcomment');
//==== Jual Barang ======
Route::get('/barang-di-jual/create', 'JualController@create');
Route::post('/barang-di-jual/{slug} ', 'JualController@store');

Route::get('/barang-di-jual', 'JualController@index');
Route::get('/barang-di-jual/{slug} ', 'JualController@show');

Route::get('/barang-di-jual/{slug}/edit', 'JualController@edit');
Route::post('/barang-di-jual/{slug}/edit', 'JualController@update');

Route::get('/kategory/{slug}', 'JualController@tag');

Route::get('/barang-di-jual/{id}/delete', 'ImageController@destroy');

Route::post('/commentar/{slug}','JCommentController@store');

Route::get('/commentar/{id}/edit', 'JCommentController@edit');
Route::post('/commentar/{id}/edit', 'JCommentController@update');

Route::get('/commentar/{id}/delete', 'ImageController@destroyimgcomment');
//===== End Jual Barang
Route::get('/{name}', 'HomeController@user');

Route::post('/edit-name/{id} ', 'UserController@editname');
Route::post('/edit-gravatar/{id} ', 'UserController@editgravatar');
