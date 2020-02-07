<ul class="media-list">
    @foreach ($answers as $answer)
        @if (0 === $answer->parent_answer_id)
            <!-- 0=質問直下の回答 -->
            <li class="media mb-3 pt-5">
                <img class="mr-2 rounded" src="{{ Gravatar::src($question->user->email, 50) }}" alt="">
                <div class="media-body">
                    <div>
                        {!! $answer->mark_body_answer !!}aa
                    </div>
                        @foreach ($answers as $answer_answer)
                            @if ($answer_answer->parent_answer_id === $answer->id)
                            <!-- 親回答だったら表示 -->
                            <div>
                                <ul class="media-list">
                                <li class="media mb-3">
                                    <img class="mr-2 rounded" src="{{ Gravatar::src($question->user->email, 50) }}" alt="">
                                    <div class="media-body">
                                        {{ $answer_answer->content }}
                                    </div>
                                </li>
                                </ul>
                            </div>   
                            @endif
                        @endforeach
                        {!! Form::open(['route' => 'answers.store', 'files' => true]) !!}
                            <div class="form-group">
                                {!! Form::textarea("content$answer->id", old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                                {!! Form::hidden('answer_id', $answer->id) !!}
                                {!! Form::hidden('question_id', $question->id) !!}
                                {!! Form::hidden('parent_answer_id', $answer->id) !!}
                                {!! Form::submit('Post', ['class' => 'btn btn-info float-right col-xl-2']) !!}
                            </div>
                        {!! Form::close() !!}
                </div>
            </li>
        @endif
    @endforeach
</ul>