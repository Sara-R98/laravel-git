@extends('layouts.app')
@section('content')
<h1 dir="rtl"><a href="{{route('posts.edit' , $post->id)}}">{{$post->title}}</a></h1>
<div dir="rtl">{{$post->content}}</div>
    
@endsection