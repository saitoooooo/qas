@if (Auth::id() != $question->id)
    @if (Auth::user()->is_favorites($question->id))
        <div class="float-left">
        {!! Form::open(['route' => ['favorites.unfavorite', $question->id], 'method' => 'delete']) !!}
            {!! Form::submit('unFavorite', ['class' => "btn btn-outline-warning"]) !!}
        {!! Form::close() !!}
        </div>
    @else
        <div class="float-left">
        {!! Form::open(['route' => ['favorites.favorite', $question->id]]) !!}
        </div>
        <div class="float-left">
            {!! Form::submit('Favorite', ['class' => "btn btn-outline-success" ]) !!}
        {!! Form::close() !!}
        </div>
    @endif
@endif