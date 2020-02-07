@if (Auth::user()->is_category_followed($category->id))
        <div class="float-left">
        {!! Form::open(['route' => ['categories.unfollow', $category->id], 'method' => 'delete']) !!}
            {!! Form::submit('unfollow', ['class' => "btn btn-outline-warning"]) !!}
        {!! Form::close() !!}
        </div>
@else
        <div class="float-left">
        {!! Form::open(['route' => ['categories.follow', $category->id]]) !!}
            {!! Form::submit('follow', ['class' => "btn btn-outline-success" ]) !!}
        {!! Form::close() !!}
        </div>
@endif