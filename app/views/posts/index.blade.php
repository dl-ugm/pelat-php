@extends('layouts.master')
@section('content')
    @foreach($posts as $post)
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="clearfix">
                {{ $post->title }}
                {{ Form::open(['url'=>'post/destroy','class'=>'pull-right'])}}
                {{ Form::hidden('id', $post->id) }}
                <div class="btn-group">
                    <a class="btn btn-default" href="#">
                        <span class="glyphicon glyphicon-pencil"></span> Edit
                    </a>
                    <button class="btn btn-default" href="#"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                </div>
                {{ Form::close() }}
            </h2>
        </div>
        <div class="panel-body">
            {{ $post->content }}
        </div>
    </div>
    @endforeach
@stop