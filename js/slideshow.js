var slideIndex = 1;
var tempDot = "";
var timeout;
var slides = document.getElementsByClassName("slide");
var dots = document.getElementsByClassName("dot");
var lastSlide;
var currentSlide;
var nextSlide;
var tempLast;


function selectSlide(x) {
console.log(x);
	clearTimeout(timeout);
 	if(x<1){x=slides.length};
 	if(x>slides.length){x=1};
 	currentSlide = x;
	tempLast = lastSlide;
	if(x == slides.length)
	{
		lastSlide = slides.length - 1;
		nextSlide = 1;
	}
	else if(x == 1)
	{
		nextSlide = 2;
		lastSlide = slides.length;
	}
	else
	{
		nextSlide = x + 1;
		lastSlide = x - 1;	
	};
	
	last = slides[lastSlide - 1].style;
	current = slides[currentSlide - 1].style;
	next = slides[nextSlide - 1].style;
	
	next.transition = "0s";
	next.marginLeft = "35vw";

	current.transition = "2s";
	current.marginLeft = "-35vw";
	last.transition = "2s";
	last.marginLeft ="-105vw";
	
	timeout = setTimeout(selectSlide, 4000, nextSlide);
}

$(document).ready(function() {

	selectSlide(1);
	
	$(".slide").mouseover(function() {
		clearTimeout(timeout);
	});
	
	$(".slide").mouseleave(function() {
		timeout = setTimeout(selectSlide, 4000, nextSlide);
	});
});