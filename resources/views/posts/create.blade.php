@extends('layouts.app')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
             @foreach ($errors->all() as $error)
                  {{$error}}<br/>
                 
             @endforeach
        </div>
    @endif
   
    {!!Form::open(['method'=>'POST' ,'action'=>'App\Http\Controllers\PostsController@store', 'files'=>true])!!}
      <div class="form-group">
        {!!Form::label('title' , 'عنوان:') !!}
        {!!Form::text('title' , null , ['class'=>'form-control'])!!}  
      </div>
      <div class="form-group">
        {!!Form::label('body' , 'توضیحات:') !!}
        {!!Form::textarea('body' , null , ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!!Form::label('file' , 'تصویر اصلی:') !!}
        {!!Form::file('file', ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!!Form::submit('ذخیره' , ['class'=>'btn btn-primary']) !!}
      </div>
    {!!Form::close()!!}
    

    {{-- //  <form action="/posts" method="post" dir="rtl">
    //     @csrf
    //     <input type="text" name="title" placeholder="عنوان مطلب">
    //     <br/>
    //     <textarea type="text" name="body" placeholder="توضیحات مطلب"></textarea>
    //     <br/>
    //     <button type="submit" name="submit">ذخیره</button>
    // </form> --}}
    
@endsection