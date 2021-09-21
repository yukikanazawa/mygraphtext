@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
<link rel="stylesheet" href=https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css>
@section('content')
    <div class='body'>
    <div class="flex">
        <div class='home'><a href='/manager/'>ホーム</a></div>->
        <div class='history'><a href='/manager/subjects/{{ $subject->id }}/'>{{ $subject->title }}</a></div>->
        <div class='history'><a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/'>
        {{ $field->title }}/{{ $category->title }}</a></div>->
        <div class='history'><a href="/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/{{ $post->id }}">{{ $post->title }}</a></div>
    </div>
    <h1>{{ $post->title }}[管理者用]</h1>
        <div class="flex">
            <form method="POST" action="/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}" id="form_delete">
                @csrf
                @method('DELETE')
                <input type="hidden" name="post_id" value='{{ $post->id }}'/>
                <input type="submit" style="display:none">
                <a href="/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/{{ $post->id }}/edit"><<編集>></a>
                <a class='delete'><span onclick="return deletePost();"><<削除>></span></a>
            </form></br>
        </div>
        <div class='post'>
            <p class='updated_at'>{{ $post->updated_at }}</p></br>
            <h4 class='text_body'>{!! nl2br($post->body_with_link) !!}</h4></br>
            <div class='paths'>
                @if ( !($post->paths == null) )
                    @foreach ($post->paths as $path)
                        <a href='/_static/mygraphtext/public/storage/files/posts/{{ $path }}'>{{$path}}</a>　　/ 　
                    @endforeach
                @endif
            </div></br>
            <div class='files'>
                @if ( !($post->files == null) )
                    @foreach ($post->files as $file)
                        <iframe src='/_static/mygraphtext/storage/app/public/files/posts/{{ $file }}' width=600px height=400px></iframe>
                    @endforeach
                @endif
            </div>
        </div>
        <div class='back'>[<a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/'>戻る</a>]</div>
    </div>
    
    <script>
    function deletePost(){
        'use strict';
        if (confirm('この投稿自体の情報をすべて削除しますか？')){
            document.getElementById('form_delete').submit();
        } else{
            return false;    
        }
    }
    </script>
@endsection
