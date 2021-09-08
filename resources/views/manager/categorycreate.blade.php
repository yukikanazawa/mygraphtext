@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
@section('content')
<div class='body'> 
    <h1>{{ $field->title }}のカテゴリーの新規作成</h1>
        <form action="/manager/subjects/{{ $subject->id }}/{{ $field->id }}/store" method="POST">
            {{ csrf_field() }}
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="category[title]" placeholder="タイトルを記載" size="48">
            </div><br>
            <input type="submit" value="保存"/>
        </form>
    <div class="back">[<a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/'>戻る</a>]</div>
</div>
@endsection