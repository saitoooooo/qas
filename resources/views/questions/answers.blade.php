<ul class="media-list">
    @foreach ($answers as $answer)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($question->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {{ $answer->content }}
                </div>
                @include('questions.comments', ['answer_id' => $answer->id])
            </div>
        </li>
                {!! Form::open(['route' => 'comments.store']) !!}
                    <div class="form-group">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::hidden('answer_id', $answer->id) !!}
                        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
    @endforeach
</ul>