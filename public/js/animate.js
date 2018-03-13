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
}