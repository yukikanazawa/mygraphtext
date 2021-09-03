<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    
    <div class='body'> 
    <h1>学習指導教材[管理者用]</h1>
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
</html>
