

$("#menu-toggle").click(function (e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
  $("#page-content-wrapper").toggleClass("toggled");
});
$(".m-close").click(function (e) {
    e.preventDefault();
    $("#wrapper").removeClass("toggled");
    $("#page-content-wrapper").removeClass("toggled");
});


$('.box-toggle').click(function () {
  if ($(this).find('i').hasClass('feather-minimize-2')) {
    $(this).closest('.card').removeClass("expand-div");
    $(this).closest('.card-header').removeClass("rounded-0");
    $(this).find('i').removeClass('feather-minimize-2').addClass('feather-maximize-2');

  } else {
    $(this).closest('.card').addClass("expand-div");
    $(this).closest('.card-header').addClass("rounded-0");

    $(this).find('i').removeClass('feather-maximize-2').addClass('feather-minimize-2');

  }

});

var forEach = function(t, o, r) {
  if ("[object Object]" === Object.prototype.toString.call(t))
      for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);
  else
      for (var e = 0, l = t.length; l > e; e++) o.call(r, t[e], e, t)
};

var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
  forEach(hamburgers, function(hamburger) {
      hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
      }, false);
  });
}

$(window).scroll(function() {
    if ($(this).scrollTop() > 60) {

        $('#back-to-top').fadeIn();

    } else {

        $('#back-to-top').fadeOut();
    }
});
// scroll body to 0px on click
$(document).on("click", "#back-to-top", function() {
    $('body,html').animate({
        scrollTop: 0
    }, 400);
});

$(document).on("click", ".img-v", function() {
    let img = $(this).attr("src");
    $(".i-v-content").attr("src", img);
    $(".i-v-content").addClass("animate__zoomIn");
    $(".img-viewer").show();
});

$(document).on("click",".close-i-v",function(){
    $(".img-viewer").fadeOut(300);

});

$(function () {
    $('[data-toggle="popover"]').popover()
})








