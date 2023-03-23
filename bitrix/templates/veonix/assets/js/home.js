$(document).ready(function () { 
  $(".home_blog_top li").click(function (e) {
    e.preventDefault();
    var type_id = $(this).attr("data-id");
    var url_bt = $(this).attr("data-url");
    var text_bt = $(this).attr("data-text");
    if (!$(this).hasClass("active_cat")) {
      $(".home_blog_top_list li").removeClass("active_cat");
      $(this).addClass("active_cat");
      $('.home_blog_block_item').fadeOut(300);
      $('.home_blog_block_item[data-id="'+type_id+'"]').fadeIn(300);
      $(".home_blog .button_line").attr("href",url_bt);
      $(".home_blog .button_line span").text(text_bt);
    }
    
   });

  if ($(".home_service_box").length > 0 && document.body.clientWidth < 680) {
    // var home_service_box = new Swiper(".home_service_box", {
    //   slidesPerView: "auto",
    //   freeMode: true, 
    //   speed: 600,
    //   mousewheel: true, 
    //   pagination: {
    //       el: ".home_clients_slide + .home_clientabout_pagination",
    //       type: "progressbar",
    //     },
    //   on: {
    //     slideChange: function () {
    //       $(".home_clients_box .drag_bt").fadeOut(400);
    //       $(".home_clients_slide").removeClass("anim_slider")
    //     },
   
    //   },
  
    // });
  }

  // var client_about = new Swiper(".home_clientabout_slide", {
  //   slidesPerView: 1,
  //   loop: false,
  //   speed: 600,
  //   loopFillGroupWithBlank: true,
  //   slideToClickedSlide:true,
  //   mousewheel: true,
  //   freeMode: true,
  //   breakpoints: {
  //     680: {
  //       slidesPerView: 2,

  //     },
  //   },
  //   pagination: {
  //       el: ".home_clientabout_slide + .home_clientabout_pagination",
  //       type: "progressbar",
  //     },
  //   on: {
  //     slideChange: function () {
  //       $(".home_clientabout_box .drag_bt").fadeOut(400);
  //       $(".home_clientabout_slide").removeClass("anim_slider")
  //     },
  //   },

  // });


  slider_all=[];
 
 
  if ($(".home_smi_slide").length>0) {
    home_smi_slide = new Splide('.home_smi_slide', {
      perPage: 1,
      perMove: 1,
      arrows: false,
      gap: "1.39vw",
      pagination: false,
      drag   : 'free',
      autoWidth: true,
      wheel:true
    });
    slider_all.push(home_smi_slide);
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
 
 
  
  if ($(".home_smi_slide").length>0) {  home_smi_slide.mount();}
  

 





  // var client_list = new Swiper(".home_clients_slide", {
  //   slidesPerView: "auto",
  //   freeMode: true, 
  //   speed: 600,
  //   mousewheel: true, 
  //   pagination: {
  //       el: ".home_clients_slide + .home_clientabout_pagination",
  //       type: "progressbar",
  //     },
  //   on: {
  //     slideChange: function () {
  //       $(".home_clients_box .drag_bt").fadeOut(400);
  //       $(".home_clients_slide").removeClass("anim_slider")
  //     },
 
  //   },

  // });





  // var smi_list = new Swiper(".home_smi_slide", {
  //   slidesPerView: 2,
  //   mousewheel: true, 
  //   breakpoints: {
  //     680: {
  //       slidesPerView: 6,

  //     },
  //   },
  //   pagination: {
  //       el: ".home_smi_slide + .home_clientabout_pagination",
  //       type: "progressbar",
  //     },
  //   on: {
  //     slideChange: function () {
  //       $(".home_smi .drag_bt").fadeOut(400);
  //       $(".home_smi_slide").removeClass("anim_slider")
  //     },
  //   },

  // });

  // var blog_list = new Swiper(".home_blog_slide", {
  //   slidesPerView: 1,
  //   mousewheel: true, 
  //   speed: 600,
  //   breakpoints: {
  //     680: {
  //       slidesPerView: 2,

  //     },
  //   },
  //   pagination: {
  //       el: ".home_blog_slide + .home_clientabout_pagination",
  //       type: "progressbar",
  //     },
  //   on: {
  //     slideChange: function () {
  //       $(".home_blog .drag_bt").fadeOut(400);
  //       $(".home_blog_slide").removeClass("anim_slider")
  //     },
  //   },

  // });

  // var princip_list = new Swiper(".home_princip_list", {
  //   slidesPerView: 1,
  //   mousewheel: true, 
  //   direction: "vertical",
  //   speed: 600,
  //   centeredSlides: true,
  //   loop: true,
  //   autoplay: {
  //     delay: 3500,
  //     disableOnInteraction: true,
  //   },
  //   breakpoints: {
  //     680: {
  //       slidesPerView: 3,
  //       autoplay: false,
  //     },
  //   },
 
  //   on: {
  //     slideChange: function () {
        
  //     },
  //   },

  // });



 
});