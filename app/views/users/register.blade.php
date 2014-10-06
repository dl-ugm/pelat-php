<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
    * { margin: 0 auto; padding: 0; }
    body { font-family: sans-serif; background: #444; }
    #container {
        margin: 30px auto;
        background: #FFF;
        max-width: 70%;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 15px rgba(0,0,0,.5);
    }
    h1 { text-align: center;   }
    input { padding: 5px 7px; margin-bottom: 1.5em; }
    label { display: block; }
    </style>
</head>
<body>
    <div id="container">
        <h1>Form Pendaftaran</h1>
        <hr/>
        {{-- Jika ada error --}}
        @if ( $errors )
            <ul>
                {{-- Looping Error --}}
                @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif
        {{ Form::open(['to'=>'register']) }}

            {{ Form::label('nama','Nama Lengkap') }}
            {{ Form::text('nama') }}

            {{ Form::label('email','Email') }}
            {{ Form::text('email') }}

            {{ Form::label('alamat','Alamat') }}
            {{ Form::textarea('alamat') }}

            <hr/>

            {{ Form::submit('Daftar') }}

        {{ Form::close() }}
    </div>
</body>
</html>