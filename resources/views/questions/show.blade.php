@extends('layouts.app')

@section('content')

    <h1>{{ $question->title }}</h1>

    <p></p>{{ $question->content }}</p>

@endsection