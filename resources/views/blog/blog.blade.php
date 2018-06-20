@extends('layouts.myblog')
@extends('blog.banner')
@extends('blog.newsLetter')

@section('main')
	<main>


		@foreach($articles as $article)

			<div class="post">
				<img src="../images/content/pokemon_raichu.jpg" alt="">
				<div class="article">
					<section class="themeSection">
						<span class="category">{!! $article->category->name !!}</span>
						<h3 class="theme">{!! $article->title !!}</h3>
						<section class="authorArticle">
							<section class="authorName"> <i class="fa fa-user" aria-hidden="true"></i>
								<span>{!! $article->author->name !!}</span>
							</section>
							<section class="publicationDate"> <i class="fa fa-calendar" aria-hidden="true"></i>
								<time>{{$article->created_at->format('M d,Y')}}</time>
							</section>

						</section>
					</section>

					<article>
						{{substr($article->article,0, 400)}}
					</article>

					<a class="readMore" href="/detail/{{$article->id}}">Читать далее...</a>
				</div>

				<section class="infoArticle">
					<section class="comment">
						<section>
							<i class="fa fa-comments-o" aria-hidden="true"></i>
							<i class="quantity">{{$article->comments()->count()}}</i>
							<span>Comment</span>
						</section>
						{{--<section>
							<i class="fa fa-heart-o" aria-hidden="true"></i>
							<i class="quantity">25</i>
							<span>LIKE</span>
						</section>--}}
					</section>

					<section class="social">
						<a href="" class="fa fa-facebook" aria-hidden="true"></a>
						<a href="" class="fa fa-github" aria-hidden="true"></a>
						<a href="" class="fa fa-vk" aria-hidden="true"></a>
						<a href="" class="fa fa-instagram" aria-hidden="true"></a>
					</section>
				</section>
			</div>

            @if($loop->index == 1)
                <section class="citacion">
                    <q class="myCitate">
                        It's about having an actives lifestyles, staying of’shealthy powers, and making the right decisions. Life is bes about balance. Not everybody wants to run a marathon, but we extra have a now days flight of stairs.
                    </q>
                    <span class="authorCitate">Apolo Ohno</span>
                </section>
            @endif



		@endforeach

        {{$articles->links()}}


	</main>

@endsection
