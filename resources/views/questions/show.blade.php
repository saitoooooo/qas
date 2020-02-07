@extends('layouts.app')

@section('content')

    <div Class="question-detail border-bottom p-5">
        <h1>{{ $question->title }}</h1>
        <p></p><span class="text-muted">投稿日 {{ $question->created_at }}</span></p>
        <div>
            {!! $question->mark_body !!}
        </div>
        <div class="text-right">
            <img class="mr-2 rounded" src="{{ Gravatar::src($question->user->email, 50) }}" alt="">
            <p>{!! link_to_route('users.show', $question->user->name, ['id' => $question->user->id], ['class' => 'text-muted']) !!}</p>
        </div>
    </div>
        @include('questions.answers', ['answers' => $answers])
            @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'answers.store', 'files' => true]) !!}
                    <div class="form-group">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2', 'id' => 'mde']) !!}
                        {!! Form::hidden('question_id', $question->id) !!}
                        {!! Form::hidden('parent_answer_id', 0) !!}
                        <input type="file" name="image">
                        {{ csrf_field() }}
                        {!! Form::submit('Post', ['class' => 'btn btn-info float-right col-xl-2']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
@endsection