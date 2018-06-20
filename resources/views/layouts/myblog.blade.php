<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="/css/content.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/css/fontAll.css">
    @section('head')


    @endsection

    @yield('head')
	<link rel="stylesheet" type="text/css" href="/css/queryMiddle.css">
	<link rel="stylesheet" type="text/css" href="/css/querySmall.css">
	<link rel="stylesheet" type="text/css" href="/css/queryXSmall.css">
	<link rel="stylesheet" type="text/css" href="/css/myAnimate.css">
	<link rel="stylesheet" type="text/css" href="/css/myKeyframes.css">
</head>


<body>
	<div class="wrapper">

		<div class="hideMenu">
			<div class="buttonTogle">
				<span class="buttonTogle_elem"></span>
				<span class="buttonTogle_elem"></span>
				<span class="buttonTogle_elem"></span>
			</div>
			<div class="navigation">
				<h5>Menu</h5>
				<ul>

					<li>
						<a href="{{route('blog_all')}}">Блог</a>
					</li>
					<li>
						<a href="/gallery">Фотогалерея</a>
					</li>
					<li>
						<a href="{{route('blog_about')}}">Обо мне</a>
					</li>
					<li>
						<a href="{{route('blog_contact')}}">Контакты</a>
					</li>
				</ul>
			</div>
			<div class="hideCategories">
				<h5>CATEGORIES</h5>
				<ul class="HidelistCategories">
					@foreach($infoCategory as $nameCategory=>$countCategory)
						<li>
							<a href="{{url('/blog/'.$nameCategory)}}" class="categName">{!! $nameCategory !!}</a>
						</li>
					@endforeach


				</ul>
			</div>
		</div>

		<header>

			<ul>

				<li>
					<a href="/blog">Блог</a>
				</li>
				<li>
					<a href="/gallery">Фотогалерея</a>
				</li>
				<li>
					<a href="/about">Обо мне</a>
				</li>
				<li>
					<a href="/contact">Контакты</a>
				</li>
			</ul>
			<h4 class="logo">My blog</h4>
			<section class="social">

				<a href="" class="fa fa-facebook" aria-hidden="true"></a>
				<a href="" class="fa fa-github" aria-hidden="true"></a>
				<a href="" class="fa fa-vk" aria-hidden="true"></a>
				<a href="" class="fa fa-instagram" aria-hidden="true"></a>
			</section>
		</header>


		@yield('banner')
		@yield('newsLetter')

		<div class="content">
			@yield('main')


            @section('aside')
                <aside>
                    <form class="asideInner" id = "searchArticle" action="home/searchArticle" method="post">
						{{ csrf_field() }}
                        <input type="text" class="search" name="searchQuery">
                        <input type="submit" class="submit" value="&#x1F50D;">
                    </form>

                    <div class="asideInner categories">
                        <h5>CATEGORIES</h5>
                        <section class="listCategories">

							@foreach($infoCategory as $nameCategory=>$countCategory)
								<section class="categorie">
									<a href="{{url('/blog/'.$nameCategory)}}" class="categName">{!! $nameCategory !!}</a>
									<span class="quantiyArticle">{{$countCategory}}</span>
								</section>
							@endforeach
                        </section>
                    </div>

                    <div class="asideInner latestPost">
                        <h5>Latest Post</h5>
                        @foreach($latestPost as $article)

                            <section class="sidebarPost">
                                <img src="../images/content/latestPostSidebar.png" alt="">
                                <section class="postText">
                                    <a href="{{url('/detail/'.$article->id)}}" class="sidebarArticle">
                                        {!! $article->title !!}
                                    </a>
                                    <section class="info">
                                        <time>{{$article->created_at->format('M d Y')}}</time>
                                        <section>
                                            <i>LIKE</i>
                                            <i class="quantityLike">233</i>
                                        </section>

                                    </section>
                                </section>
                            </section>
                        @endforeach


                    </div>
                    <div class=" asideInner slider">
                        <img src="../images/content/sidebarSlider2.png" alt="" class="active">
                        <i class="fa fa-long-arrow-left"></i>
                        <i class="fa fa-long-arrow-right"></i>
                    </div>
                </aside>
            @endsection


			@yield('aside')

		</div>
		<footer>
			<div class="footerInfoWrapper">
				<div class="footerInfo">
					<section class="info aboutBlog">
						<h6>About Blog</h6>
						<section class="innerSection">
							<span>
								Lorem ipsum dolor sit amet, conser adipisicing  esse cillum dolore nulla pariatur.
							</span>
							<img src="" alt=""></section>

					</section>
					<section class="info tweets">
						<h6>Latest Tweets</h6>
						<section class="innerSection">
							<section class="myTweets">
								<section class="tweetsInfo">
									<i class="fa fa-twitter"></i>
									<span>@Twitter@magicalrebekah</span>
								</section>
								<span class="developText">
									Developer Advocate @heyval isaiyou knows the very well is about things .
								</span>
							</section>
							<section class="myTweets">
								<section class="tweetsInfo">
									<i class="fa fa-twitter"></i>
									<span>@Twitter@magicalrebekah</span>
								</section>
								<span class="developText">
									Developer Advocate @heyval isaiyou knows the very well is about things .
								</span>
							</section>
						</section>

					</section>
					<section class="info follow">
						<h6>Follow me instagram</h6>
						<img src=""></section>
					<section class="info footerComment">
						<h6>Latest comment</h6>
						<section class="innerSection">
							<section class="commentFooter">
								<span class="name">From Alex :</span>
								<span class="text">
									Developer Advocate @heyval isaiyou know the very well is talking about things .
								</span>
							</section>
							<section class="commentFooter">
								<span class="name">From Jhon Doe :</span>
								<span class="text">
									Developer Advocate @heyval isaiyou know the very well is talking about things .
								</span>
							</section>
						</section>
					</section>
				</div>
			</div>
			<div class="copyrightInfo">

				<time>©2018</time>
				<span>
					Copyright .all right reserved by awesome theme   i   terms policy   i   disclaimer
				</span>

			</div>

		</footer>
	</div>
	<script type="text/javascript" src="/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="/js/ajax.js"></script>
	<script type="text/javascript" src="/js/animate.js"></script>

</body>


</html>
