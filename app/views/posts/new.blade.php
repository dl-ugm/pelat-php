@section('content')
<h2>Tambah Post</h2>
<hr/>
{{ Form::open(['url'=>'post/create']) }}

    <div class="form-group">
        {{ Form::label('title','Title') }}
        {{ Form::text('title','',['class'=>'form-control']) }}
        <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>

    <div class="form-group">
        {{ Form::label('content','Content') }}
        {{ Form::textarea('content','',['class'=>'form-control']) }}
        <span class="text-danger">{{ $errors->first('content') }}</span>
    </div>

    <div class="form-group">
        {{ Form::submit('Tambah Post',['class'=>'btn btn-primary btn-block']) }}
    </div>
{{ Form::close() }}
@stop