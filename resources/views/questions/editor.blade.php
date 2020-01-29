@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
                @if (Auth::id() == $user->id)
                    {!! Form::open(['route' => 'questions.store']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'タイトル：') !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control', 'rows' => '2']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', '質問の詳細：') !!}
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                        </div>
                            {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
                @endif
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the QA</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection