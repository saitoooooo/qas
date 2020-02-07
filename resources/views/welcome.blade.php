@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="row">
        <div class="col-sm-8">
            @include('feed.navtabs', ['user' => $user])
            @if (count($questions) > 0)
                @include('questions.questions', ['questions' => $questions])
            @endif
        </div
        @else
            <div class="top-wrapper">
                <h1>SiteTitle</h1>
                <p>xxxx xxxxxx xxx xxx</br>xx xxxxx xxxxxxxxxxxxx xxxxxxx</p>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-danger']) !!}
                {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-info']) !!}
            </div>
            
            <div class="border-top p-4">
                <input class="form-check-input" type="checkbox" id="check1" checked>
                <label class="form-check-label" for="check1">基本的なQA機能の実装。ユーザ登録機能（ここまではスクールの学習範囲）<br>回答の階層化</label>
                <br>
                <input class="form-check-input" type="checkbox" id="check2" checked>
                <label class="form-check-label" for="check2">Category分け機能の実装</label>
                <br>
                <input class="form-check-input" type="checkbox" id="check3" checked>
                <label class="form-check-label" for="check3">Markdownエディタの実装</label>
                <br>
                <input class="form-check-input" type="checkbox" id="check3" checked>
                <label class="form-check-label" for="check3">ファイルアップロード機能</label>
                <br>
                <input class="form-check-input" type="checkbox" id="check4">
                <label class="form-check-label" for="check4">MarkdownのD&Dでの画像アップロード機能</label>
                <br>
                <br>
                <input class="form-check-input" type="checkbox" id="check5">
                <label class="form-check-label" for="check5">Markdwonのカスタマイズ。一回の改行で表示時も改行されるようにする</label></label>
                <br>
                <input class="form-check-input" type="checkbox" id="check5">
                <label class="form-check-label" for="check5">ユーザアイコンのカスタマイズ（graverではなく、本サイトで画像管理）</label>
                <br>
                <input class="form-check-input" type="checkbox" id="check5">
                <label class="form-check-label" for="check5">QA検索機能</label>
                <br>
                <input class="form-check-input" type="checkbox" id="check5">
                <label class="form-check-label" for="check5">ブログ機能</label>
                <br>
                <input class="form-check-input" type="checkbox" id="check5">
                <label class="form-check-label" for="check5">カテゴリの一覧ページ</label>
                <br>
                <input class="form-check-input" type="checkbox" id="check5">
                <label class="form-check-label" for="check5">タグ機能</label>
                <br>
                <input class="form-check-input" type="checkbox" id="check5">
                <label class="form-check-label" for="check5">カテゴリ、タグフォロー機能、いいね機能</label>
                <br>
                <input class="form-check-input" type="checkbox" id="check5">
                <label class="form-check-label" for="check5">コントローラ、ビューの整理（構造が汚い気がする）</label>
            </div>
        @endif
    </div>
    </div>
@endsection