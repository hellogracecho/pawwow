// ** Slick Settings
jQuery(document).ready(function($) {
  $(".slider").slick({
    autoplay: true,
    arrows: false,
    autoplaySpeed: 4000,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true
        }
      }
    ]
  });
});
