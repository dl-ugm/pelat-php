<?php

Route::get('/',function(){
    return View::make('posts.index')->withPosts(Post::all());
});