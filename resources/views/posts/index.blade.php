@extends('layouts.app')
@section('content')

<ul dir="ltr">
  @foreach ($posts as $post)
    <div class="image-container col-sm-2">
    <img src="{{$post->path}}" height="100" class="img-responsive">
    </div>
<li>
  <a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>
    <span>{{$post->user->name}}</span>
</li>
     
  @endforeach

</ul>
    
@endsection