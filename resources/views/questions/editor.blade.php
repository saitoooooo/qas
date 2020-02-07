@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="clearfix">
                @if (Auth::id() == $user->id)
                    {!! Form::open(['route' => 'questions.store']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'タイトル：') !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                        </div>
                        <label for="category">Category:</label>
                        <div>
                            <select name="category" class="form-control">
                                <option value="default">Categoryを選択してください</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', '質問の詳細：') !!}
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id' => 'mde']) !!}
                        </div>
                            {!! Form::submit('Post', ['class' => 'btn btn-info btn-lg float-right']) !!}
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