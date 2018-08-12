@extends('layouts.myblog')

@section('head')
    @parent
    <link rel="stylesheet" type="text/css" href="/css/aboutMe.css">
    <link rel="stylesheet" type="text/css" href="/css/gallery.css">
@endsection


@section('main')
<main>
	<div class="gallery">

		@foreach ($albums as $album)
			<figure class="album_section">

			<a  href="{{ url('gallery/'.$album) }}">
			    <img src="./images/rectangle-53.png" alt="{{ $album }}">
		    </a>
		    <figcaption>
		    	<a class="album_name" href="{{ url('gallery/'.$album) }}">
		    	    {{$album}}
		    	</a>
		    </figcaption>
		</figure>
		@endforeach



	</div>
</main>
@endsection
