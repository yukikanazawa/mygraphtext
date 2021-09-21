@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
<link rel="stylesheet" href=https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css>
@section('content')
    <div class='body'> 
    <div class="flex">
        <div class='home'><a href='/manager/'>ホーム</a></div>->
        <div class='history'><a href='/manager/subjects/{{ $subject->id }}/'>{{ $subject->title }}</a></div>->
        <div class='history'><a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/'>
        {{ $field->title }}/{{ $category->title }}</a></div>
    </div>
    <h1>{{ $field->title }}({{ $category->title }})[管理者用]</h1>
        <div class="flex">
            <div class="delete">    
                <form method="POST" action="/manager/subjects/{{ $subject->id }}/{{ $field->id }}" id="form_delete">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="category_id" value='{{ $category->id }}'/>
                    <input type="submit" style="display:none">
                    <a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/create'><<新規作成>></a>
                    <a class='delete'><span onclick="return deletePost();"><<{{ $category->title }}の削除>></span></a>
                </form></br>
            </div>
        </div>
        
        <div class='title'>
            @foreach ($posts as $post)
                <h4><a href="/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/
                {{ $post->id }}">・{{ $post->title }}</a></h4>
            @endforeach
        </div>
        <div class='back'>[<a href='/manager/subjects/{{ $subject->id }}/'>戻る</a>]</div>
    </div>
    
    <script>
        function deletePost(){
            'use strict';
            if (confirm('このカテゴリーの情報を全て削除しますか？')){
                document.getElementById('form_delete').submit();
            } else{
                return false;    
            }
        }
    </script>
@endsection