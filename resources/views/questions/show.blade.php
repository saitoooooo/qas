@extends('layouts.app')

@section('content')

    <h1>{{ $question->title }}</h1>
    <p></p>{{ $question->content }}</p>
        @include('questions.answers', ['answers' => $answers])
            @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'answers.store']) !!}
                    <div class="form-group">
                        {!! Form::textarea('content_root_answer', old('content_root_answer'), ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::hidden('question_id', $question->id) !!}
                        {!! Form::hidden('parent_answer_id', 0) !!}
                        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
@endsection