const nextIcon = '<img class="wid" src="assets/images/right.png">';
const prevIcon = '<img class="wid" src="assets/images/left.png">';

$(document).ready(function () {
  $(".owl-carousel").owlCarousel();
});

var owl = $('.owl-carousel');
owl.owlCarousel({
  items: 1,
  loop: true,
  nav: true,
  navText: [
    prevIcon,
    nextIcon
  ],
  margin: 10,
  autoplay: true,
  autoplayTimeout: 7000,
  autoplayHoverPause: true
});
$('.play').on('click', function () {
  owl.trigger('play.owl.autoplay', [1000])
})
$('.stop').on('click', function () {
  owl.trigger('stop.owl.autoplay')
})

// Próximo slider
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = x.length }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex - 1].style.display = "block";
}

const checkbox = document.querySelector('#checkbox-menu');
const div = document.querySelector('body');

checkbox.addEventListener('click', function () {
  if (checkbox.checked) {
    div.style = "overflow: hidden; "
  } else {
    div.style = "overflow: ;"
  }
});