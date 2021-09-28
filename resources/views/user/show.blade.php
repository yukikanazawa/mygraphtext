@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
<link rel="stylesheet" href=https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css>
@section('content')
    <div class='body'>
    <div class="flex">
        <div class='home'><a href='/'>ホーム</a></div>->
        <div class='history'><a href='/subjects/{{ $subject->id }}/'>{{ $subject->title }}</a></div>->
        <div class='history'><a href='/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/'>
        {{ $field->title }}/{{ $category->title }}</a></div>->
        <div class='history'><a href="/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/{{ $post->id }}">{{ $post->title }}</a></div>
    </div>
    <h1>{{ $post->title }}</h1>
        <div class='post'>
            <p class='updated_at'>{{ $post->updated_at }}</p></br>
            <h4 class='text_body'>{!! nl2br($post->body_with_link) !!}</h4></br>
            <div class='paths'>
                @if ( !($post->paths == null) )
                    @foreach ($post->paths as $path)
                        <a href='/_static/mygraphtext/public/storage/files/posts/{{ $path }}'>{{ $path }}</a>　　/ 　
                    @endforeach
                @endif
            </div></br>
            <div class='files'>
                @if ( !($post->files == null) )
                    @foreach ($post->files as $file)
                        <a href='/_static/mygraphtext/public/storage/files/posts/{{ $file }}'>{{ $file }}</a>
                        <iframe src='/_static/mygraphtext/storage/app/public/files/posts/{{ $file }}' width=600px height=400px></iframe>
                    @endforeach
                @endif
            </div>
        </div>
        <div class='flex'>
            <div class='back'>[<a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/'>戻る</a>]</div>
            <div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="3" data-url="https://social-plugins.line.me/ja/how_to_install" data-color="default" data-size="small" data-count="false" style="display: none;"></div>
            <script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="comment">
                <h2>新規のコメントを作成</h2>
                @if( !empty(Auth::user()->name) ) 
                <form action="/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $post->id }}/store" method="POST">
                    @csrf
                    <div class="usercomment">
                    <input type="hidden" name="post_id" value='{{ $post->id }}'/>
                        ユーザーネーム</br>
                        <input type="text" name="comment[name]" value="{{ Auth::user()->name }}" size="48" readonly /> </br> 
                        この投稿内容の感想</br>
                        <textarea name="comment[body]" placeholder="感想を記載" rows="5" cols="65"></textarea>
                        <input type="submit" value="保存"/>
                    </div>
                </form>
                @else
                </br><h3>※コメントをするには右上からログインしてください。</h3></br></br></br>
                @endif
                
                <h2>コメント欄</h2></br></br>
                @foreach ($comments as $comment)
                    <div class="flex">
                    <p>・{{ $comment->name }}　</p>
                    <form method="POST" action="/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $post->id }}/delete" id="form_destroy">
                        @csrf
                        @method('DELETE')
                        @if( $comment->name == optional(Auth::user())->name )
                            <input type="hidden" name="comment_id" value='{{ $comment->id }}'/>
                            <input type="submit" style="display:none">
                            <button onclick="return deleteComment();">削除</button>
                            <script>
                                function deleteComment(){
                                    'use strict';
                                    if (confirm('本当にコメントを削除しますか？')){
                                        document.getElementById('form_destroy').submit();
                                    } else{
                                        return false;    
                                    }
                                }
                            </script>
                        @endif
                    </form>
                    </div>
                <p>{{ $comment->body }}</p></br>
                @endforeach</br></br>
            </div>
    </div>
@endsection
