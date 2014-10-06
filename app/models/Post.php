<?php
class Post extends Eloquent {
    protected $table = 'posts';
    public static $rules = ['title'=>'required','content'=>'required'];
    public static $editRules = ['id'=>'required','title'=>'required','content'=>'required'];
}