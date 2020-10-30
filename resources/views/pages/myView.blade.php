<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        
    </head>
    <body class="antialiased">
    <div dir="ltr">
      <h3> welcome to myview</h3>
      <h3> ای دی :{{$id}}</h3>
      <h3> نام  :{{$name}}</h3>
      <h3> پسورد :{{$password}}</h3> 

        </div>
    </body>
</html> -->
@extends('layouts.app')
@section('content')
      <h3> welcome to myview</h3>
      <h3> ای دی :{{$id}}</h3>
      <h3> نام  :{{$name}}</h3>
      <h3> پسورد :{{$password}}</h3> 
@endsection
@section('footer')
<p>فوتر</p>
@endsection