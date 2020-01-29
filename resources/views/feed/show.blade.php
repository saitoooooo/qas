@extends('layouts.app')

@section('content')
    <div class="row">
            @include('feed.navtabs', ['user' => $user])
            @if (count($questions) > 0)
                @include('questions.questions', ['questions' => $questions])
            @endif
    </div>
@endsection