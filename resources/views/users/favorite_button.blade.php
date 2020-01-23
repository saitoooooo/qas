@if (Auth::id() != $micropost->id)
    @if (Auth::user()->is_favorites($micropost->id))
        <div class="float-left">
        {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('unFavorite', ['class' => "btn btn-outline-warning"]) !!}
        {!! Form::close() !!}
        </div>
    @else
        <div class="float-left">
        {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
        </div>
        <div class="float-left">
            {!! Form::submit('Favorite', ['class' => "btn btn-outline-success" ]) !!}
        {!! Form::close() !!}
        </div>
    @endif
@endif