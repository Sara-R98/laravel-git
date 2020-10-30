@extends('layouts.app')
@section('content')
    <h3>ویرایش فرم</h3>
    @can('update', $post)
      
    @endcan
    {!!Form::model($post ,['method'=>'PATCH' ,'action'=>['App\Http\Controllers\PostsController@update' , $post->id]])!!}
      <div class="form-group">
        {!!Form::label('title' , 'عنوان:') !!}
        {!!Form::text('title' , $post->title , ['class'=>'form-control'])!!}  
      </div>
      <div class="form-group">
        {!!Form::label('body' , 'توضیحات:') !!}
        {!!Form::textarea('body' , $post->content , ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!!Form::submit('بروزرسانی' , ['class'=>'btn btn-warning']) !!}
      </div>
    {!!Form::close()!!}

    {!!Form::model($post ,['method'=>'DELETE' ,'action'=>['App\Http\Controllers\PostsController@destroy' , $post->id]])!!}
      <div class="form-group">
        {!!Form::submit('حذف' , ['class'=>'btn btn-danger']) !!}
      </div>
      {!!Form::close()!!}
      @endcan




{{-- <form action="/posts/{{$post->id}}" method="post" dir="rtl">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
<input type="text" name="title" placeholder="عنوان مطلب" value="{{$post->title}}">
        <br/>
<textarea type="text" name="body" placeholder="توضیحات مطلب">{{$post->content}}</textarea>
        <br/>
        <button type="submit" name="submit">ذخیره</button>
    </form>

    <form action="/posts/{{$post->id}}" method="post" dir="rtl">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <br/>
        <button type="submit" name="submit">حذف</button>
    </form> --}}
    
@endsection