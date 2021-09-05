@extends('layouts.app')

<link rel="stylesheet" href='{{ secure_asset('css/style.css') }}' />
@section('content')
    <div class='body'> 
    <h1>学習指導教材[管理者用]</h1>
        <div class='title'>
            @foreach ($subjects as $subject)
                <h4><a href="/manager/subjects/{{ $subject->id }}">・{{ $subject->title }}</a></h4>
            @endforeach
        </div>
    </div>    
@endsection
