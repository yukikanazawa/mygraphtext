@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
        <button class="edit">[<a href="/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/{{ $post->id }}/edit">edit</a>]</button>
        <form method="POST" action="/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/{{ $post->id }}" id="form_delete">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none">
            <button class='delete'>[<span onclick="return deletePost();">delete</span>]</button>
        </form>
        <div class='post'>
            <h2 class='title'>{{ $post->title }}</h2>
            <p class='updated_at'>{{ $post->created_at }}</p>
            <p class='body'>{{ $post->body }}</p>
        </div>
        <div class='back'>[<a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/'>戻る</a>]</div>
    </div>
    
    <script>
    function deletePost(){
        'use strict';
        if (confirm('本当に削除しますか？')){
            document.getElementById('form_delete').submit();
        } else{
            return false;    
        }
    }
    </script>
@endsection
