@extends('layots')

@section('head')
    @parent
    <link rel="stylesheet" type="text/css" href="/css/aboutMe.css">
@endsection

@section('main')
    <main>
				<div class="post">
					<img src="../images/content/pokemon_raichu.jpg" alt="">
					<div class="article">
						<section class="themeSection">
							
							<h3 class="theme">be the one to stand out in the crowed</h3>
							<section class="authorArticle">
								<section class="authorName"> <i class="fa fa-user" aria-hidden="true"></i>
									<span>Dike AcAlister</span>
								</section>
								<section class="publicationDate"> <i class="fa fa-calendar" aria-hidden="true"></i>
									<time>January 16,2016</time>
								</section>

							</section>
						</section>

						<article>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcos laboris nisis ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore egiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id it laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore  ut labore et dolore now is the great working with travlling magnam aliquam quaerat voluptatem.
						</article>

					</div>

					<section class="infoArticle">
						<section class="comment">
							<section>
								<i class="fa fa-comments-o" aria-hidden="true"></i>
							    <i class="quantity">06</i>
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
	</main>
@endsection


