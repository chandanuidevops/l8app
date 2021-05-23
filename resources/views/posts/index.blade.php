
@extends('layouts.posts')
@section('title')
List of posts
@endsection
@component('components.message',['title'=>'<span>component title</span>'])

this is a slot message
    @endcomponent
@section('content')



@endsection
