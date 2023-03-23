 

script_load = true;
$(document).ready(function () { 
  if (document.body.clientWidth < 680 && $(".home_service_box").length>0) {
    new Splide( '.home_service_box',{
      perPage: 1,
      perMove: 1,
      arrows: false,
      gap: "1.39vw",
      pagination: false,
      drag   : 'free',
      autoWidth: true,
    
    } ).mount();
  }

load_page_block = function() {
  if (script_load) {
    script_load = false;
 
    var slider_all =[];
 
    if ($(".home_blog_slide_22").length>0) {
       home_blog_slide_22 = new Splide('.home_blog_slide_22', {
        perPage: 1,
        perMove: 1,
        arrows: false,
        gap: "1.39vw",
        pagination: false,
        drag   : 'free',
        autoWidth: true,
      
      });

   
      slider_all.push(home_blog_slide_22);
       
      
      home_blog_slide_22.mount();
    }



    if ($(".home_blog_slide_23").length>0) {
 
     home_blog_slide_23 = new Splide('.home_blog_slide_23', {
      perPage: 1,
      perMove: 1,
      arrows: false,
      gap: "1.39vw",
      pagination: false,
      drag   : 'free',
      autoWidth: true,
     
     });
      slider_all.push(home_blog_slide_23);
      
      home_blog_slide_23.mount();
   }






    
 
    if ($(".home_clients_slide").length>0) {
       
      home_clients_slide = new Splide('.home_clients_slide', {
        perPage: 1,
        perMove: 1,
        arrows: false,
        gap: "3.125vw",
        pagination: false,
        drag   : 'free',
        autoWidth: true,
         
      });
      slider_all.push(home_clients_slide);
      home_clients_slide.mount();
    }

    var otziv_list_html = document.querySelector(".otziv_page_block");
    if ($(".home_clientabout_slide").length>0) {
       
 
      home_clientabout_slide = new Splide('.home_clientabout_slide', {
        perPage: 1,
        perMove: 1,
        arrows: false,
        gap: "1.39vw",
        pagination: false,
        drag   : 'free',
        autoWidth: true,
        
      });
      slider_all.push(home_clientabout_slide);
      home_clientabout_slide.mount();
    }

    slider_all.forEach(function(item, i, arr) {
 
      var bar    = $(slider_all[i].root).parents("section").find(".progress_bar")
  
      slider_all[i].on( '    move   drag dragging scroll scrolled', function () {
  
        $(slider_all[i].root).parents("section").find(".drag_bt").fadeOut(300);
        $(slider_all[i].root).removeClass("anim_slider")
        var end  = slider_all[i].Components.Controller.getEnd() + 1;
        var rate = Math.min( ( slider_all[i].index + 1 ) / end, 1 );
        bar.css({
          "width": ""+100 * (rate) + "%"
        })
        
      } );
    });
    

  }
}
$(window).on('mousemove', { passive: true }, load_page_block);
$(window).on("scroll", load_page_block);
});


 


$(document).ready(function () { 
  lazyLoadInstance = new LazyLoad({});

     

  lazyLoadInstance.update();
  
});
$(document).ready(function () { 
  $(".text_line").addClass("text_line_active")
  $(".animation_loader").css({"height":0});
});

$(document).ready(function () { 
   

  $(".web_principles_item").on({
    mouseenter: function () {$(this).find(".web_principles_item_text").show(500)},
    mouseleave: function () {$(this).find(".web_principles_item_text").hide(500)}
  });
});


  lineFunction = function() {
    let scrollTop = $(window).scrollTop();
    let lineBlockItem = $(".list_logo_box");
    if (lineBlockItem.length>0) {
      let lineBlock = lineBlockItem.offset().top;
      let windowHeight = $(window).height();
   //  let transform = -(scrollTop - lineBlock + windowHeight + windowHeight/16);
      let transform = -(scrollTop + windowHeight/1.5 -lineBlock);
     
      if ((scrollTop + windowHeight/1.5) > (lineBlock )) {
   
        lineBlockItem.css({
          "transform": "translate3d("+(transform)+"px, 0, 0)"
        });  
      }
    }
    
  }
  lineFunction();
  $(window).on("scroll", function() {
    lineFunction();
    //lazyLoadInstance.update();
  
  });








$(document).ready(function () { 
  client_w=document.body.clientWidth;
 
  SVGAnimate.init({
      element: '.button_line_1_icon',
      animations: '[{"strokeWidth":"2"}]'
  });

  $(".web_line, .web_b1, .web_goal_home, .home_princip").mousemove(function(e){
    elementLine = $(".web_line_text")
    if (elementLine.offset().top > 50) {
      elementLine.css('transform', 'translate3d('+e.clientX+'px, 0, 0)');
    }
  });

  $('.video_showrell_hover').mousemove(function(e) {
    let x = e.offsetX-(6*(client_w/100)),
    y = e.offsetY-(6*(client_w/100));
    $(".video_showrell_play").css({
    
      "left": x,
      "top": y,
      "transform": "scale3d(1, 1, 1)"
    });    
  }).mouseout(function(e){           
    $(".video_showrell_play").css({     
      "left": "50%",
      "top": "50%",
      "transform": "scale3d(0, 0, 1)"
    });   
  });

  $(".showrell_play").click(function (e) { 
    e.preventDefault();
    var vw = $(window).width()  / 100;
    var scrollTo =  $(".header").height() + (2 * vw);
    if ($(".video_showrell_play").hasClass("video_showrell_pause")) {
      $(".video_showrell_full video").trigger('pause');
    } else {      
      $(".video_showrell_full video").trigger('play');
      $('html, body').animate({
        scrollTop: $(".video_showrell").offset().top
     }, 500);
    }
    $(".video_showrell_full").toggle(300);
    $(".video_showrell_play").toggleClass("video_showrell_pause");
    
  
  });

  $("[data-text]").click(function (e) { 
    var theme_form = $(this).data("text");
    $(".theme_val").val(theme_form);
  });

  // $("[href='#form']").click(function (e) { 
  //   Fancybox.show([{
  //     src: '#form'
  //   }]); 
  // });
 
 

  if ($(".web_step_box_slider").length>0) {
    web_step_box_slider = new Splide( '.web_step_box_slider',{
      perPage: 1,
      perMove: 1,
      arrows: false,
      gap: "1.39vw",
      pagination: false,
      drag   : 'free',
      autoWidth: true,
    
    } );
    web_step_box_slider.mount();
    web_step_box_slider.on( 'move moved drag scroll', function () {
      $(".drag_bt").fadeOut(400);
      $(".web_step_box_slider").removeClass("anim_slider")
    } );
  }


  // var swiper = new Swiper(".web_step_box_slider", {
  //   slidesPerView: 1,
  //   loop: false,
  //   loopFillGroupWithBlank: true,
  //   slideToClickedSlide:true,
  //   breakpoints: {
  //     680: {
  //       slidesPerView: 3,

  //     },
  //   },
  //   on: {
  //     touchStart: function () {
  //       $(".drag_bt").fadeOut(400);
  //       $(".web_step_box_slider").removeClass("anim_slider")
  //     },
  //   },

  // });
 



});