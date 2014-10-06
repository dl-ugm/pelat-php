<?php

// Route untuk menampilkan seluruh post
Route::get('/',['uses'=>'PostController@getIndex']);
// Route untuk menampilkan form Tambah Post
Route::get('post/create',['uses'=>'PostController@getCreate']);
// Route untuk memproses data dari form Tambah Post
Route::post('post/create',['uses'=>'PostController@postCreate']);
// Route untuk menampilkan form Edit Post
Route::get('post/edit/{id}',['uses'=>'PostController@getUpdate']);
// Route untuk memproses data dari Form Edit Post
Route::post('post/update',['uses'=>'PostController@postUpdate']);
// Route untuk menghapus POST
Route::post('post/delete/{id}',['uses'=>'PostController@postDestroy']);