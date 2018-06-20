@extends('layouts.myblog')

@section('head')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/aboutMe.css">
	<link rel="stylesheet" type="text/css" href="/css/contactUs.css">
@endsection


@section('main')
	<main>
				<section class="mapWrapper">

					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5149.437141045789!2d27.791245489684446!3d49.8101583755345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1suk!2sua!4v1517696666866" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="mapInfo">
						<div class="mapInfo_title">

								Contact information

						</div>
						<div class="mapInfo_text">
							In case you some aquestions popped in your’s mind, FeIn case you some aquestions popped in your’el email or even visit us.
						</div>
						<div class="mapInfo_social">
							<section class="mapInfo_social_section">
								<i class="fa fa-home"></i>
								<span>
									Address: 123 Street Name, City Name, United States.
								</span>
							</section>
							<section class="mapInfo_social_section">
								<i class="fa fa-envelope"></i>
								<span>
									Email: info@lifestyle.com
								</span>
							</section>
							<section class="mapInfo_social_section">
								<i class="fa fa-globe"></i>
								<span>
									www.lifestyle.com
								</span>
							</section>
						</div>
					</div>
				</section>


				<form action="" class="contactForm">
					<input type="text" class="textUser userName" placeholder="Введите имя">
					<input type="text" class="textUser userEmail" placeholder="Ваш email">

					<textarea type="text" class="textUser messageText" placeholder="Текст сообщения"></textarea>
					<input type="text" class="submit" value="Отправить">
				</form>
	</main>

@endsection
