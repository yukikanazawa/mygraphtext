@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
<link rel="stylesheet" href=https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css>
@section('content')
    <div class='body'> 
    <div class="flex">
        <div class='home'><a href='/'>ホーム</a></div>->
        <div class='history'><a href='/subjects/{{ $subject->id }}/'>{{ $subject->title }}</a></div>->
        <div class='history'><a href='/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/'>
        {{ $field->title }}/{{ $category->title }}</a></div>
    </div>
    <h1>{{ $field->title }}({{ $category->title }})</h1>
        <div class='title'>
            @foreach ($posts as $post)
                <h4><a href="/subjects/{{ $subject->id }}/{{ $field->id }}/{{ $category->id }}/{{ $post->id }}">・{{ $post->title }}</a></h4>
            @endforeach
        </div>
        <div class='back'>[<a href='/subjects/{{ $subject->id }}/'>戻る</a>]</div>
    </div>
@endsection