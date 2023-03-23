 

! function(i) {
  var o, n;
  i(".title_block").on("click", function() {
    o = i(this).parents(".accordion_item"), n = o.find(".info"),
      o.hasClass("active_block") ? (o.removeClass("active_block"),
        n.slideUp()) : (o.addClass("active_block"), n.stop(!0, !0).slideDown(),
        o.siblings(".active_block").removeClass("active_block").children(
          ".info").stop(!0, !0).slideUp())
  })
}(jQuery);

 

$(document).ready(function() {
 
  var my_video1 = document.getElementById("video1"), my_video1 = my_video1.getElementsByTagName("iframe")[0].contentWindow;
  var my_video2 = document.getElementById("video2"), my_video2 = my_video2.getElementsByTagName("iframe")[0].contentWindow;
  var my_video3 = document.getElementById("video3"), my_video3 = my_video3.getElementsByTagName("iframe")[0].contentWindow;
  $(".video-prev").on("click", function() {
    var ids = $(this).attr("data-id");
    var ls = "my_video"+ids;
    eval(ls).postMessage('{"event": "command", "func": "playVideo", "args": ""}', "*");
    $("#video" + ids + " .video-iframe").show(500);
    $("#video" + ids + " .video-prev").addClass("opn");
  });

  $(".pause_video").on("click", function() {
    var ids1 = $(this).attr("data-id");
    var ls1 = "my_video"+ids1;
    eval(ls1).postMessage('{"event": "command", "func": "pauseVideo", "args": ""}', "*");
    $("#video" + ids1 + " .video-iframe").hide(500);
    $("#video" + ids1 + " .video-prev").removeClass("opn");
  });

  $(".podrob").on("click", function() {
    $(this).toggleClass("active");
  });
  $(".bx5-price a").on("click", function() {
    let idform = $(this).attr("data-idform");
    $("#modal-form").val(idform);
  });
  $("a[href^='#top']").click(function(){
    var _href = $(this).attr("href");
    $("html, body").animate({scrollTop: $(_href).offset().top+"px"});
    return false;
});




});


