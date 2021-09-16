@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
@section('content')
<div class='body'> 
    <h1>{{ $post->title }}の編集</h1>
        
        <form action="/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/{{ $post->id }}/update"
        method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="post[title]" value='{{ $post->title }}' size="48">
            </div><br>
            <div class="textbody">
                <h2>本文</h2>
                <textarea name="post[body]" value='{{ $post->body }}' rows="5" cols="75"></textarea>
            </div>
            <div class="form-group mt-4">
                <h2>pdfまたはグラフ</h2>
                <label for="eaxmpleFormControlFile1">ファイルを再度選択し直してください。</label>
                <input type="file" id="exampleFormControlfile1" name="file" class="form-control"></br>
            </div>
            <button type="submit">保存</button>
        </form>
        
    <div class="back">[<a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}'>戻る</a>]</div>
</div>
@endsection