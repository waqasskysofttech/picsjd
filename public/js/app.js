// Initialize Wow
new WOW().init();

	$('.gallery-slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  autoplay: true,
   prevArrow:"<button type='button' class='slick-prev pull-left'><i class='bx bx-chevron-right'></i></button>",
  nextArrow:"<button type='button' class='slick-next pull-right'><i class='bx bx-chevron-left' ></i></button>"
});

	$('.photography-slider').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  prevArrow:"<button type='button' class='slick-prev pull-left'><i class='bx bx-chevron-right'></i></button>",
  nextArrow:"<button type='button' class='slick-next pull-right'><i class='bx bx-chevron-left' ></i></button>"
});

$(".testimonialSlider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
        });
// Initialize Slick
$(document).ready(function () {
    if ($(".testimonialSlider")) {
        // $(".testimonialSlider").slick({
        //     slidesToShow: 1,
        //     slidesToScroll: 1,
        //     arrows: false,
        //     autoplay: true,
        //     autoplaySpeed: 2000,
        //     dots: true,
        // });
    }
    if ($(".bannerSlider")) {
        $(".bannerSlider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 4000,
            dots: true,
        });
    }
    $(".singleProduct__img").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        asNavFor: ".singleProduct__pictures",
    });
    $(".singleProduct__pictures").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: ".singleProduct__img",
        dots: false,
        arrows: false,
        focusOnSelect: true,
    });
});




const openSearch = document.querySelector(".openSearch");
const closeSearch = document.querySelector(".closeSearch");
const headerSearch = document.querySelector(".header__search")

openSearch.addEventListener("click",()=>{
headerSearch.classList.add("active");
})
closeSearch.addEventListener("click",()=>{
headerSearch.classList.remove("active");
})