@extends('layouts.app')

@section('content')

    <h1>{{ $question->title }}</h1>

    <p></p>{{ $question->content }}</p>
            @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'answers.store']) !!}
                    <div class="form-group">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
@endsection