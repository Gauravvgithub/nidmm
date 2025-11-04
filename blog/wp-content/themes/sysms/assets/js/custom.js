$(document).ready(function(){
 

$(".scroll").click(function (event) {
 event.preventDefault();
 var full_url = this.href;
 var parts = full_url.split("#");
 var trgt = parts[1];
 var target_offset = $("#" + trgt).offset();
 var target_top = target_offset.top - 50;
 $('html, body').animate({
  scrollTop: target_top
 }, 500);
});
  var toTop = $("<button type='button' class='gotoTop'>&uarr;</button>").appendTo("body");
  $(window).scroll(function () {
    if ($(window).scrollTop() > $(window).height()) {
      toTop.fadeIn("fast");
    } else {
      toTop.fadeOut("fast");
    }
  });
  toTop.click(function (e) {
    e.preventDefault();
    $("html, body").animate({
      scrollTop: 0
    }, 1000);
  });


	$(".show-avatars img").attr('alt','Avatar');
	
  //$(".embed-responsive iframe").addClass("embed-responsive-item");
  
  $("iframe").parent().addClass("embed-responsive embed-responsive-16by9 ratio ratio-16x9");
  $("iframe").addClass("embed-responsive-item");
  
});


$(window).scroll(function () {
  $.each($('.loading-lazy'), function () {
    if ($(this).attr('data-src') && $(this).offset().top < ($(window).scrollTop() + $(window).height() + 100)) {
      var source = $(this).data('src');
      $(this).attr('src', source);
      $(this).removeAttr('data-src');
    }
  })
});