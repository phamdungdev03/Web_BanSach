var slides = document.querySelectorAll('.slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide, 5000);


function nextSlide() {
  slides[currentSlide].className = 'slide';
  currentSlide = (currentSlide + 1) % slides.length;
  slides[currentSlide].className = 'slide active';
}

function prevSlide() {
  var currentSlide = document.querySelector(".active");
  var prevSlide = currentSlide.previousElementSibling;

  if (prevSlide) {
    currentSlide.classList.remove("active");
    prevSlide.classList.add("active");
  }
}

function nextSlide() {
  var currentSlide = document.querySelector(".active");
  var nextSlide = currentSlide.nextElementSibling;

  if (nextSlide) {
    currentSlide.classList.remove("active");
    nextSlide.classList.add("active");
  }
}
var slideIndex = 1;
showSlides(slideIndex);


function plusSlides(n) {

  slideIndex += n;

  showSlides(slideIndex);
}


function currentSlide(n) {

  slideIndex = n;

  showSlides(slideIndex);
}

function showSlides(n) {

  var slides = document.getElementsByClassName("mySlides");

  var dots = document.getElementsByClassName("dot");


  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (var i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }


  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }


  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}


setInterval(function () { plusSlides(1) }, 5000);