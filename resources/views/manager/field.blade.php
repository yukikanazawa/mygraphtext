@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
@section('content')
    <div class='body'> 
        <div class="flex">
            <div class='home'><a href='/manager/'>ホーム</a></div>->
            <div class='history'><a href='/manager/subjects/{{ $subject->id }}/'>{{ $subject->title }}</a></div>
        </div>
        <h1>{{ $subject->title }}[管理者用]</h1>
        <div class='create'><a href='/manager/subjects/{{ $subject->id }}/create'><<分野を新規作成>></a></div>
        <div class='title'>
            @foreach ($fields as $field)</br>
                <form method="POST" action="/manager/subjects/{{ $subject->id }}" id="form_delete">
                    @csrf
                    @method('DELETE')
                    <input type="submit" style="display:none">
                    <input type="hidden" name="field_id" value='{{ $field->id }}'/>
                    <div class="flex">
                        <h3>・{{ $field->title }}</h3>
                        <span class="mgr-10"></span>
                        <button onclick="return deletePost();">削除</button>
                    </div>
                    <a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/create'><<カテゴリーを新規作成>></a>
                    @foreach ($categories as $category)
                        @if ( $category->field_id == $field->id )
                        <h6><a href="/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}">・{{ $category->title }}</a></h6>
                        @endif
                    @endforeach</br>
                </form>
            @endforeach
        </div>
        <div class='back'>[<a href='/manager/'>戻る</a>]</div>
    </div>
    
    <script>
        function deletePost(){
            'use strict';
            if (confirm('この分野自体とその中の情報を全て削除しますか？')){
                document.getElementById('form_delete').submit();
            } else{
                return false;    
            }
        }
     </script>
@endsection
