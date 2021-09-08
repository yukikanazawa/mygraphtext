@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
@section('content')
    <div class='body'> 
    <div class='home'><a href='/manager/'>ホーム</a></div>
    <h1>ホーム[管理者用]</h1>
        <div class='title'>
            @foreach ($subjects as $subject)
                <h4><a href="/manager/subjects/{{ $subject->id }}">・{{ $subject->title }}</a></h4>
            @endforeach
        </div>
    </div>    
@endsection
