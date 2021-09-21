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
                <input type="text" name="post[title]" placeholder="タイトルを記載" value="{{ old('post.title') }}" size="48">
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div><br>
            <div class="textbody">
                <h2>本文</h2>
                <textarea name="post[body]" placeholder="記述の有無は任意です" rows="5" cols="75"></textarea>
            </div>
            <div class="form-group mt-4">
                <h2>画像、テキストファイルはこちら</h2>
                <input type="file" multiple="multiple" id="exampleFormControlfile1" name="files[]" class="form-control" accept=image/*,.pdf></br>
                <h2>上記以外のファイルはこちら</h2>
                <input type="file" multiple="multiple" id="exampleFormControlfile2" name="paths[]" class="form-control"></br>
            </div>
            <button type="submit">保存</button>
        </form>
        
    <div class="back">[<a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}'>戻る</a>]</div>
</div>
@endsection