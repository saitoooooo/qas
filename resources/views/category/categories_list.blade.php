<ul class="media-list">
    @foreach ($categories as $category)
        <li class="media mb-3">
            <div class="media-body">
                <button type="button" class="btn btn-primary">
                  {{ $category->name }} <span class="badge badge-light">4</span>
                </button>
            </div>
        </li>
    @endforeach
</ul>
{{ $categories->links('pagination::bootstrap-4') }}