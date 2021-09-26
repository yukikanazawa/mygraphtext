@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
<link rel="stylesheet" href=https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css>
@section('content')
    <div class='body'> 
    <div class='home'><a href='/'>ホーム</a></div>
    <h1>ホーム</h1>
        <div class='title'>
            @foreach ($subjects as $subject)
                <h4><a href="/subjects/{{ $subject->id }}">・{{ $subject->title }}</a></h4>
            @endforeach
        </div>
    </div>    
@endsection
