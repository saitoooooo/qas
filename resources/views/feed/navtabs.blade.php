<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('feed.new', ['id' => $user->id]) }}" class="nav-link {{ Request::is('feed/new') ? 'active' : '' }}">新着</a></li>
    <li class="nav-item"><a href="{{ route('feed.follow', ['id' => $user->id]) }}" class="nav-link {{ Request::is('feed/follow') ? 'active' : '' }}">フォロー中</a></li>
</ul>