$(document).ready(function () { 
 
    if ($(".ptf_projects_slider").length > 0) {
      ptf_projects_slider = new Splide( '.ptf_projects_slider',{
        perPage: 1,
        perMove: 1,
        arrows: false,
        gap: "1.39vw",
        pagination: false,
        drag   : 'free',
        autoWidth: true,
      
      } );
      ptf_projects_slider.mount();
      $(document).on('click', ".ptf_projects_slider_next" , function(e) {
        ptf_projects_slider.go( '+1' );
       });
       $(document).on('click', ".ptf_projects_slider_prev" , function(e) {
        ptf_projects_slider.go( '-1' );
       });



        // var swiper_portfolio = new Swiper(".ptf_projects_slider", {
        //     slidesPerView: 2,
        //     loop: true,
        //     loopFillGroupWithBlank: true,
        //     slideToClickedSlide:true,
        //     breakpoints: {
        //       680: {
        //         slidesPerView: 4,
        
        //       },
        //     },
        //     navigation: {
        //         nextEl: ".ptf_projects_slider_next",
        //         prevEl: ".ptf_projects_slider_prev",
        //       },
        //     on: {
        //         slideChange: function () {
        //         lazyLoadInstance.update();
        //       },
        //     },
        
        //   });
    }

    if ($("body").hasClass("portfilio_pages")) {      
      $(window).on("scroll", function() {
        let scrollTop = $(window).scrollTop();
        if (scrollTop > $(".hd_block").height() - $("header").height()) {
          $("header").addClass("header_fixed")
        } else {
          $("header").removeClass("header_fixed")
        }
      });
    }

    $(document).on('click', ".home_portfolio_top_list li" , function() {
      var cat_case = $(this).attr("data-id");
      if (!$(this).hasClass("active_cat")) {
        $(".portfolio_top_list li").removeClass("active_cat")
        $(this).addClass("active_cat");
        $(".portfolio_list").hide();
        $(".portfolio_list[data-id='"+cat_case+"']").fadeIn(300);
      }
     });


 });