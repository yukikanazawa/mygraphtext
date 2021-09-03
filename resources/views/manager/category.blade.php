<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <div class='body'> 
    <h1>学習指導教材[管理者用]</h1>
        <div class='create'><h4><a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/create'><<新規作成>></a></h4></div></br>
        <div class='title'>
            @foreach ($posts as $post)
                <h4><a href="/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/{{ $post->id }}">・{{ $post->title }}</a></h4>
            @endforeach
        </div>
        <div class='back'>[<a href='/manager/subjects/{{ $subject->id }}/'>戻る</a>]</div>
    </div>
</html>
