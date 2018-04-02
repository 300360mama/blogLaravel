@extends('layots')
@extends('banner')
@extends('newsLetter')


@section('main')
	<main>
		<div class="post">
			<img src="../images/content/pokemon_raichu.jpg" alt="">
			<div class="article">
				<section class="themeSection">
					<span class="category">{{$article->title}}</span>
					<h3 class="theme"></h3>
					<section class="authorArticle">
						<section class="authorName"> <i class="fa fa-user" aria-hidden="true"></i>
							<span>{{$article->author->name}}</span>
						</section>
						<section class="publicationDate"> <i class="fa fa-calendar" aria-hidden="true"></i>
							<time>{{$article->created_at->format('d M, Y')}}</time>
						</section>

					</section>
				</section>

				<article>
					{{$article->article}}
				</article>


			</div>

			<section class="infoArticle">
				<section class="comment">
					<section>
						<i class="fa fa-comments-o" aria-hidden="true"></i>
						<i class="quantity">{{$article->comments()->count()}}</i>
						<span>Comment</span>
					</section>
					<section>
						<i class="fa fa-heart-o" aria-hidden="true"></i>
						<i class="quantity">25</i>
						<span>LIKE</span>
					</section>
				</section>

				<section class="social">
					<a href="" class="fa fa-facebook" aria-hidden="true"></a>
					<a href="" class="fa fa-github" aria-hidden="true"></a>
					<a href="" class="fa fa-vk" aria-hidden="true"></a>
					<a href="" class="fa fa-instagram" aria-hidden="true"></a>
				</section>
			</section>
		</div>
		<div class="gotoArticle">

            @if($articlePrev)

                <a href="{{url('/detail/'.$articlePrev->id)}}" class="goto prevArticle">

                    <i class="fa fa-long-arrow-left"></i>
                    <span>Previous Article</span>
                </a>
            @else
                <span class="goto prevArticle gotoDisabled" >

                    <i class="fa fa-long-arrow-left"></i>
                    <span>Previous Article</span>
                </span>
            @endif

            @if($articleNext)
                    <a href="{{url('/detail/'.$articleNext->id)}}" class="goto nextArticle" >
                        <span>Next Article</span>
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
            @else
                    <span class="goto nextArticle gotoDisabled" >
                        <span>Next Article</span>
                        <i class="fa fa-long-arrow-right"></i>
                    </span>
            @endif



		</div>
		<div id="comment_article">
				<form action="">
					<input id="comment_article_name" type="text" placeholder="Ваше имя">
					<input id="comment_article_email" type="email" placeholder="Укажите ваш email адресс">
					<textarea id="comment_article_text" type="text" placeholder="Введите комментарий"></textarea>
					<input type="submit">
				</form>
			</div>
		<div class="recommendedArticle">
			<section class="recommendedArticle_rule">
						<span>
							Recomended Posts
						</span>
				<section class="switchButton">
					<i class="fa fa-long-arrow-left"></i>
					<i class="fa fa-long-arrow-right"></i>
				</section>
			</section>
			<section class="recommendedArticle_wrapper">
				<section class="recommendedArticle_post">
					<img src="../images/content/rectangle-53.png" alt="">
					<span class="recommendedArticle_post_title">
								girl on car vintage fashion
							</span>
				</section>
				<section class="recommendedArticle_post">
					<img src="../images/content/rectangle-53.png" alt="">
					<span class="recommendedArticle_post_title">
								women make a tea for cup
							</span>
				</section>
				<section class="recommendedArticle_post">
					<img src="../images/content/rectangle-53.png" alt="">
					<span class="recommendedArticle_post_title">
								girl on car vintage fashion
							</span>
				</section>
				<section class="recommendedArticle_post">
					<img src="../images/content/rectangle-53.png" alt="">
					<span class="recommendedArticle_post_title">
								i found the model 1980’s car
							</span>
				</section>
			</section>
		</div>
	</main>
@endsection








