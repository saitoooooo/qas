<ul class="media-list">
    @foreach ($questions as $question)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($question->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    <h2>{!! link_to_route('questions.show', $question->title, ['id' => $question->id]) !!}</h2>
                </div>
                <div>
                    <p><span class="badge badge-info">{{ $question->category->name }}</span></p>
                </div>
                <div>
                    <p>{!! link_to_route('users.show', $question->user->name, ['id' => $question->user->id]) !!} <span class="text-muted">posted at {{ $question->created_at }}</span></p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $questions->links('pagination::bootstrap-4') }}