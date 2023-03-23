$(document).ready(function () {
  $('.close_popup').on('click', function(e) { 
    $.fancybox.close();
  });

  $('.no_bt_1').on('click', function(e) {
    
    e.preventDefault();
    
    if ($(this).data("bt")=="no1") {
      $("#no_1 .md_no_kv").addClass("md_no_kv_red")
     } else {
      $("#no_1 .md_no_kv").removeClass("md_no_tx_red") 

     }
     
    $.fancybox.open( $('#no_1'), {
      touch: false,
    
      afterShow: function () {
        
        var valT = $("#no_1 .nmb_1").text();
        var val2 = 50;
        if (val2 >0) {
          $("#no_1 .nmb_1").addClass("md_no_tx_grn")
        }
        var go2 = function () {
        
          var interval_id2 = setInterval(function(){
            $("#no_1 .nmb_1").text(val2--);
            if (val2<0) {
              $("#no_1 .nmb_1").removeClass("md_no_tx_grn").addClass("md_no_tx_red")
            }
            if (val2==-101) {
              clearInterval(interval_id2);
              $.fancybox.close();
              $.fancybox.open( $('#no'), {});
              val2 = 50;    
              $("#no_1 .nmb_1").addClass("md_no_tx_grn").removeClass("md_no_tx_red").text(50); 
            }
          }, 30);
        }
        var interval_id = setInterval(function(){
          $("#no_1 .nmb_1").text(+valT++);
          if (valT==51) {
            clearInterval(interval_id);
            go2();
            
          }
        }, 60);
       


        
      }
    });
  });


  $('.md_yes_bt').on('click', function(e) {
    
    e.preventDefault();
    
 
     
    $.fancybox.open( $('#yes_1'), {
      touch: false,
    
      afterShow: function () {
        
        var valT = $("#yes_1 .nmb_1").text();
        var val2 = 12;
       
      
        var interval_id = setInterval(function(){
          $("#yes_1  .nmb_1").text(+valT++);
          if (valT==141) {
            clearInterval(interval_id);
            $.fancybox.close();
            $.fancybox.open( $('#yes'), {});
            
          }
        }, 50);
       


        
      }
    });
  });



  $("[data-fancybox]").fancybox({
    touch: false,
    afterShow: function(){
      $('.fancybox-container *').animate({ scrollTop: 0 }, 1100);
    }
  });

  $(".md_close").click(function(e) {
    e.preventDefault();
    $.fancybox.close();
  });
  $('.plan_go').click(function(e){
    e.preventDefault();
    $(".b10 .b9_t1").addClass("b9_t1_black")
    $("[class^=b9_info_], .b9_anim_text").addClass("anim_active")
    $(".b9_img_plan").css({
      "opacity":1
    });
 
    $(".b10 .b9_box").css({
      "transform": "scale(0)"
    });
    $(".b11").addClass("hd_block").css({
      "padding-top": "0"
    });
    var destination = $(".b9_anim_text").offset().top;
    $('html').animate({ scrollTop: destination - window.screen.height +  $(".b9_anim_text").height() + 50 }, 1100);
    

   });
  $('.b27_item_title').click(function(e){
    if ($(this).parents(".b27_item").hasClass("b27_open_item")) {

      $(this).siblings(".b27_item_text").hide(500);
      $(this).parents(".b27_item").toggleClass("b27_open_item");
 

    } else {      
      $(".b27_item").removeClass("b27_open_item")
      $(".b27_item_text").hide(500);
      
      $(this).siblings(".b27_item_text").show(500);
      $(this).parents(".b27_item").toggleClass("b27_open_item");
      
    }
  


   });



   $('.b4_title').click(function(e){
    if ($(this).parents(".b4_item").hasClass("b4_open_item")) {

      $(this).siblings(".b4_content").hide(500);
      $(this).parents(".b4_item").toggleClass("b4_open_item");
 

    } else {      
      $(".b4_item").removeClass("b4_open_item")
      $(".b4_content").hide(500);
      
      $(this).siblings(".b4_content").show(500);
      $(this).parents(".b4_item").toggleClass("b4_open_item");
      
    }
  


   });





  $('.b19_title').click(function(e){
    if ($(this).parents(".b19_item").hasClass("open_item")) {

      $(this).siblings(".b19_text").hide(500);
      $(this).parents(".b19_item").toggleClass("open_item");
 

    } else {      
      $(".b19_item").removeClass("open_item")
      $(".b19_text").hide(500);
      
      $(this).siblings(".b19_text").show(500);
      $(this).parents(".b19_item").toggleClass("open_item");
      
    }
  


   });









  
});