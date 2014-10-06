@section('content')
<h2>Edit Post</h2>
<hr/>
{{ Form::open(['url'=>'post/update']) }}

    {{ Form::hidden('id',$post->id) }}
    <div class="form-group">
        {{ Form::label('title','Title') }}
        {{ Form::text('title',$post->title,['class'=>'form-control']) }}
        <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>

    <div class="form-group">
        {{ Form::label('content','Content') }}
        {{ Form::textarea('content',$post->content,['class'=>'form-control']) }}
        <span class="text-danger">{{ $errors->first('content') }}</span>
    </div>

    <div class="form-group">
        {{ Form::submit('Edit Post',['class'=>'btn btn-primary btn-block']) }}
    </div>
{{ Form::close() }}
@stop