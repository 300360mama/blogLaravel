@extends('layouts.myblog')

@section('head')
    @parent
    <link rel="stylesheet" type="text/css" href="/css/aboutMe.css">
    <link rel="stylesheet" type="text/css" href="/css/gallery.css">
@endsection


@section('main')
<main>
	<div class="gallery">


    @foreach($photos as $path=>$photo)

    <div class="img_block">
      <img src="{{$path}}" alt="{{$photo}}">
    </div>


    @endforeach




	</div>
</main>
@endsection
