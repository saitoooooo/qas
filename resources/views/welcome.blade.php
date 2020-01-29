@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="row">
        <div class="col-sm-8">
            @include('feed.navtabs', ['user' => $user])
            @if (count($questions) > 0)
                @include('questions.questions', ['questions' => $questions])
            @endif
        </div
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the QA</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection