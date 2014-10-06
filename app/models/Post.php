<?php
class Post extends Eloquent {
    // nama tabel
    protected $table = 'posts';
    // rule untuk tambah post
    public static $rules = ['title'=>'required','content'=>'required'];
    // rule untuk edit post
    public static $editRules = ['id'=>'required','title'=>'required','content'=>'required'];
}