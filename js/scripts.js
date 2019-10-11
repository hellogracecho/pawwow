jQuery(function($) {
  $(document).ready(function() {
    $(".button a").click(function() {
      $(".overlay").fadeToggle(200);
      $(this)
        .toggleClass("btn-open")
        .toggleClass("btn-close");
    });
  });
  $(".overlay").on("click", function() {
    $(".overlay").fadeToggle(200);
    $(".button a")
      .toggleClass("btn-open")
      .toggleClass("btn-close");
    open = false;
  });
});

jQuery(function($) {
  $(window).on("scroll", function() {
    if ($(window).scrollTop() > 50) {
      $(".site-header").addClass("active");
    } else {
      //remove the background property so it comes transparent again (defined in your css)
      $(".site-header").removeClass("active");
    }
  });
});
