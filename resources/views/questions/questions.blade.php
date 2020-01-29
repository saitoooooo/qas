<ul class="media-list">
    @foreach ($questions as $question)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($question->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('questions.show', $question->title, ['id' => $question->id]) !!}

               </div>
                <div>
                    {!! link_to_route('users.show', $question->user->name, ['id' => $question->user->id]) !!} <span class="text-muted">posted at {{ $question->created_at }}</span>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $questions->links('pagination::bootstrap-4') }}