@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
@section('content')
    <div class='body'> 
    <h1>学習指導教材[管理者用]</h1>
        <div class='create'><h4><a href='/manager/subjects/{{ $subject->id }}/create'><<分野を新規作成>></a></h4>
        <div class='title'>
            @foreach ($fields as $field)
                <h4>・{{ $field->title }}</a></h4>
                <h6><a href='/manager/subjects/{{ $subject->id }}/{{ $field->id }}/create'><<カテゴリーを新規作成>></a></h6></div>
                @foreach ($categories as $category)
                    @if ( $category->field_id == $field->id )
                    <h6><a href="/manager/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}">・{{ $category->title }}</a></h6>
                    @endif
                @endforeach</br>
            @endforeach
        </div>
        <div class='back'>[<a href='/manager/'>戻る</a>]</div>
    </div>
@endsection
