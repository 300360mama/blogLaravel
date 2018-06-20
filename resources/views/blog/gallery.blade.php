@extends('layouts.myblog')

@section('head')
    @parent
    <link rel="stylesheet" type="text/css" href="/css/aboutMe.css">
    <link rel="stylesheet" type="text/css" href="/css/gallery.css">
@endsection


@section('main')
<main>
	<div class="gallery">

    @foreach($photos as $photo)

    <div class="img_block">
      <img src="{{$photo->path_to_photo}}" alt="{{$photo->alias}}">
    </div>


    @endforeach




	</div>
</main>
@endsection
