window.onload = function(){


	var buttonClick = document.querySelector('.buttonTogle');
	var hideMenu = document.querySelector('.hideMenu');
	var buttonTogleElem = hideMenu.querySelectorAll('.buttonTogle_elem');


	buttonClick.addEventListener('click', function(){

		if(hideMenu.classList.contains('slideInLeft')){
			hideMenu.classList.remove('slideInLeft');
			hideMenu.classList.add('slideInRight');

			buttonTogleElem[0].classList.remove('closeTopElem');
			buttonTogleElem[1].classList.remove('hideMiddleElem');
			buttonTogleElem[2].classList.remove('closeBottomElem');

			buttonTogleElem[0].classList.add('closeTopElemReverse');
			buttonTogleElem[1].classList.add('hideMiddleElemReverse');
			buttonTogleElem[2].classList.add('closeBottomElemReverse');





		}else{

			hideMenu.classList.add('slideInLeft');
			hideMenu.classList.remove('slideInRight');

			buttonTogleElem[0].classList.remove('closeTopElemReverse');
			buttonTogleElem[1].classList.remove('hideMiddleElemReverse');
			buttonTogleElem[2].classList.remove('closeBottomElemReverse');


			buttonTogleElem[0].classList.add('closeTopElem');
			buttonTogleElem[1].classList.add('hideMiddleElem');
			buttonTogleElem[2].classList.add('closeBottomElem');


		}

	});

	var imgWrapperArr =document.querySelectorAll('.banner .slideWrapper .imgWrapper');
	var slideRole = document.querySelector('.banner .switchSlide .switch');

	slideRole.addEventListener('click', function(e){
		e.preventDefault();
		slider(imgWrapperArr, e);
	});
}


function slider(blockImgs, e){

	var activeImgClass = 'activeImg';
	var current = 0;
	var lengthBlock = blockImgs.length;
	var controleImgs = document.querySelectorAll('.banner .switchSlide .box .rectangle');

	current = currentImg(blockImgs, activeImgClass);

	var next = (current+1) > 0 && current+1 < lengthBlock ? (current+1) : undefined;
 	var prev = (current-1) >= 0 ? current-1 : undefined;


	if(e.target.classList.contains('next')){
		nextSlide(next, current, blockImgs, activeImgClass);
		nextSlide(next, current, controleImgs, 'active' );
	}else if (e.target.classList.contains('prev')) {
		nextSlide(prev, current, blockImgs, activeImgClass);
		nextSlide(prev, current, controleImgs, 'active' );
	}

	current = currentImg(blockImgs, activeImgClass);

	nextButton(current);






	function currentImg(blockImgs, activeClass){
		for (var i = 0; i < blockImgs.length; i++) {
			if (blockImgs[i].classList.contains(activeImgClass)) {
				current = i;
			}
		}

		return current;
	}

	function nextSlide(next, current, blockImgs, activeClass){
		if(next !== undefined){
			blockImgs[current].classList.remove(activeClass);
			blockImgs[next].classList.add(activeClass);
		}
	}

	function nextButton(current){
		var next = (current+1) > 0 && current+1 < lengthBlock ? (current+1) : undefined;
	 	var prev = (current-1) >= 0 ? current-1 : undefined;
		var nextSlideButton = document.querySelector('.banner .switch .next');
		var prevSlideButton = document.querySelector('.banner .switch .prev');

		if(next === undefined){
			if(!nextSlideButton.classList.contains('disable')){
				nextSlideButton.classList.add('disable');
			}
		}else{
			if(nextSlideButton.classList.contains('disable')){
				nextSlideButton.classList.remove('disable');
			}
		}


		if(prev === undefined){
			if(!prevSlideButton.classList.contains('disable')){
				prevSlideButton.classList.add('disable');
			}
		}else{
			if(prevSlideButton.classList.contains('disable')){
				prevSlideButton.classList.remove('disable');
			}
		}


	}


}
