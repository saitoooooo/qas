<ul class="media-list">
    @foreach ($questions as $question)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($question->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $question->user->name, ['id' => $question->user->id]) !!} <span class="text-muted">posted at {{ $question->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($question->content)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $question->user_id)
                        @include('users.favorite_button', ['user' => $user])
                        {!! Form::open(['route' => ['questions.destroy', $question->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}
                        {!! Form::close() !!}
                    @else
                        @include('users.favorite_button', ['user' => $user])
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $questions->links('pagination::bootstrap-4') }}