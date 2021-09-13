@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
@section('content')
<div class='body'> 
    <h1>{{ $field->title }}/{{ $category->title }}内の新規作成</h1>
        
        <form action="/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/store"
        method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="post[title]" placeholder="タイトルを記載" size="48">
            </div><br>
            <div class="textbody">
                <h2>本文</h2>
                <textarea name="post[body]" placeholder="記述の有無は任意です" rows="5" cols="75"></textarea>
            </div>
            <div class="form-group mt-4">
                <h2>pdfまたはグラフ</h2>
                <label for="eaxmpleFormControlFile1">ファイルを選択してください</label>
                <input type="file" id="exampleFormControlfile1" name="file" class="form-control"></br>
            </div>
            <button type="submit">保存</button>
        </form>
        
    <div class="back">[<a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}'>戻る</a>]</div>
</div>
@endsection