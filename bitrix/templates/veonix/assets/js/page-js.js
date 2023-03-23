
//ALL PAGE

masiv = [];
script_load_phone = true;

load_page_script = function() {
  if (script_load_phone) {
    script_load_phone = false;
      var e=document.createElement("script");
      e.type="text/javascript";
      e.async=true;
      e.src="/bitrix/templates/veonix/assets/js/intlTelInput.min.js";
      var t=document.getElementsByTagName("script")[0];
      t.parentNode.insertBefore(e,t);
      if (t.parentNode.insertBefore(e,t)) {
        function load_phone_mask() {
          maskLoad = function(status, region, mask, el, start) {
            $(".phone").val("");
        
            mask_list = document.getElementsByClassName('phone');
            for (var i = 0; i < mask_list.length; ++i) {
                var item = mask_list[i];  
               
                rus_region = mask_region = [
                  {
                      mask: '000 000-00-00',
                      startsWith: '9',
                      lazy: true,
                      country: 'Russia'
                    },
                    {
                      mask: '+0 000 000-00-00',
                      startsWith: '7',
                      lazy: true,
                      country: 'Russia'
                    },  
                    {
                      mask: '0 000 000-00-00',
                      startsWith: '8',
                      lazy: true,
                      country: 'Russia',              
                    },
                   
                    
                  
                ];
                if (status != "delete") {       
                  if (region == "ru") {mask = rus_region} 
        
                  if (status == "load") {
                    mask_init = true;          
                    dispatchMask = IMask(item, {
                      mask: mask_region,
                      dispatch: function (appended, dynamicMasked) {                
                          var number = (dynamicMasked.value + appended).replace(/\D/g,'');      
                          return dynamicMasked.compiledMasks.find(function (m) {    
                            return number.indexOf(m.startsWith) === 0;
                          });
                      }
                    });
                    masiv.push(dispatchMask)
                  }
                 
                  if ((status == "update")) {  
                    for (var i = 0; i < masiv.length; ++i) {  
                      console.log(masiv[i]); 
                      masiv[i].updateOptions({
                        mask: mask,
                        lazy: true, 
                  
                        dispatch: function (appended, dynamicMasked) {
                          if (region == "ru") {
                            var number = (dynamicMasked.value + appended).replace(/\D/g,'');      
                            return dynamicMasked.compiledMasks.find(function (m) {        
                              return number.indexOf(m.startsWith) === 0;
                            });
                          } else {
                            return false;
                          }
                        }
                      });
                      masiv[i].masked.reset();
                      masiv[i].value=start;
                      console.log(masiv[i].value);
                      $(".phone").intlTelInput("setCountry",region);
                    }
                    
        
                    
                    
                  }
        
                    
        
                } else {
                  
                  dispatchMask.destroy();
                }
        
            }
            
          
          }
          maskLoad("load");
          iti = $("[type='tel']").intlTelInput({
         
            initialCountry: "ru",
            onlyCountries: ["ru","kz", "by", "ae", "tr", "uz", "tj",  "us", "gb"],  
            preferredCountries: [], 
          
            nationalMode: true,
            utilsScript: "/bitrix/templates/veonix/assets/js/utils.js"
          });
          region_mask = {
            "ru": {
              "start": "",
              "placeholder" : "8 (912) 345-67-89"
            },
            "by": {
              "start": "+375",
              "mask" : "+{375} 00 000-00-00",
              "placeholder" : "+375 01 1234567"
            },
            "kz": {
              "start": "+7 7",
              "mask" : "+{7} 700 000-00-00",
              "placeholder" : "+7 701 234-56-78"
            },
            "tj": {
              "start": "+992",
              "mask" : "+{992} 00 000-00-00",
              "placeholder" : "+992 90 501-23-45"
            },
            "ae": {
              "start": "+971",
              "mask" : "+{971} 0 000-00-00",
              "placeholder" : "+971 4 971-23-45"
            },
            "tr": {
              "start": "+90",
              "mask" : "+{9\\0} 000 000-00-00",
              "placeholder" : "+90 345 678-90-00"
            },
            "uz": {
              "start": "+998",
              "mask" : "+{998} 00 000-00-00",
              "placeholder" : "+998 90 123-45-67"
            },
            "us": {
              "start": "+1",
              "mask" : "+{1} 00 000-00-00",
              "placeholder" : "+1 987 654-32-10"
            },
            "gb": {
              "start": "+44",
              "mask" : "+{44} 0000 00-00-00",
              "placeholder" : "+1 9876 54-32-10"
            }
          }
        
          $(".phone").attr("placeholder",region_mask.ru.placeholder)
        
          iti.on( "countrychange", function(event) {  
                
            maskInternat = $(this).intlTelInput("getSelectedCountryData");  
            $('.region').val(maskInternat.name);
            console.log(maskInternat.iso2);
            if (!mask_init) {maskLoad("load")};
            $(this).removeClass("success_phone");  
            // $(this).blur();    
            $(this).attr("placeholder",region_mask[""+maskInternat.iso2+""]["placeholder"]);   
            maskLoad("update", maskInternat.iso2, region_mask[""+maskInternat.iso2+""]["mask"], this, region_mask[""+maskInternat.iso2+""]["start"]);         
            $(".phone").val(region_mask[""+maskInternat.iso2+""]["start"]);
        
            
          });
          phone_valid = function() { 
            $(this).removeClass("error_phone");
            if ($(this).intlTelInput("isValidNumber")) {
              $(this).addClass("success_phone");  
            } else {
              $(this).removeClass("success_phone");  
            }
          }
        
          iti.on( "keyup", phone_valid);
          iti.on( "change", phone_valid);
        }
        setTimeout(load_phone_mask, 500);
      }
      var e=document.createElement("script");
      e.type="text/javascript";
      e.async=true;
      e.src="/bitrix/templates/veonix/assets/js/jquery.fancybox.min.js";
      var t=document.getElementsByTagName("script")[0];
      t.parentNode.insertBefore(e,t);
      if (t.parentNode.insertBefore(e,t)) {
        load_fancybox = function() {
          Fancybox.bind("[data-fancybox]", { });}
          setTimeout(load_fancybox, 1000);
      }
      
      
    
  }
}
$(window).on('mousemove', { passive: true }, load_page_script);
$(window).on("scroll", load_page_script);


 


$(document).ready(function () { 

  // $('[data-fancybox]').fancybox({
  //     touch: false
  // });

  if ($('[data-mob]').length >0 && document.body.clientWidth < 680) {
    $('[data-mob]').each(function(i, obj) {
      let bgImg =  $(this).attr("data-mob");
      if ($(this).hasClass("lazy")) {
        if ($(this).prop("tagName") == "IMG") {
          $(this).attr("data-src", bgImg);
        } else {
          $(this).attr("data-bg", bgImg);
        }
      } else {
        $(this).css({
          "background-image": "url("+bgImg+")"
        })
      }
      
    });
    lazyLoadInstance = new LazyLoad({});
  } else {
    lazyLoadInstance = new LazyLoad({});
  }



  $(document).on('click', ".open_mob_menu" , function() {
    $(this).toggleClass("active_mob_menu");
    $(".header").toggleClass("no_blur");
    $(".header_menu").toggleClass("list_menu_active");
    if ($(this).hasClass("active_mob_menu")) {
      $(".header_menu").removeClass("list_menu_active_close");
    } else {
      $(".header_menu").addClass("list_menu_active_close");
    }
  });
  // parallax("[data-parallax]");
  $(".menu_active").click(function (e) { 
    e.preventDefault();
    $(this).toggleClass("bt_menu_active");
    $(".menu").toggleClass("box_menu_active");
  
  });

  $(".arrows_menu").click(function (e) { 
    e.preventDefault();
    console.log($(this).parents('li').find(".menu_child"));
    var child = $(this).parents('li').find(".menu_child");
    if (!child.hasClass("active_child")) {
      $(this).parents('li').find(".menu_child").show(300).addClass("active_child");
    } else {
      $(this).parents('li').find(".menu_child").hide(300).removeClass("active_child");
    }
    
   
  
  });

});




$(document).ready(function () { 
  client_h=$(window).height();
  wowJsLoad = function(device) {
    $('.wow').each(function () {
    var el = $(this);
      el.css({
        "visibility" : "hidden",
        "animation-name" : "none"

      }).addClass("wow-fls")
    });
  }
  wowJsLoad()
  wowJs = function(device) {
    $('.wow').each(function () {
      var el = $(this);
      var wh = $(window).height();
      var objHd = el.outerHeight();
      var anm = el.data("wow")
      var delay = el.data("pause")
      let scrollTop = $(window).scrollTop();
      if (device !="mobile") {      
        if (!el.hasClass("wow-true")) {
            
            if (anm == "fadeInUp" || anm == "fadeInDown" || anm == "fadeInLeft") {
            
              if (el.offset().top - wh  < 0 && el.offset().top+objHd > -20) {
                el.addClass("wow-true").css({
                  "visibility": "visible",
                  "animation-delay": delay+"s",
                  "animation-name": anm
                }).removeClass("wow-fls")
              }
            } else {
              if (el.offset().top - wh < 0 && el.offset().top+objHd > -20) {
                el.addClass("wow-true").css({
                  "visibility": "visible",
                  "animation-delay": delay+"s",
                  "animation-name": anm
                }).removeClass("wow-fls")
              } 
            }

          } 
          if (!el.hasClass("wow-false")) {
            if (el.offset().top+objHd < -120 || el.offset().top - wh > (wh/20)) {
              el.removeClass('wow-true').addClass("wow-fls");
              el.css({
                "visibility" : "hidden",
                "animation-delay": delay+"s",
                "animation-name" : "none"
          
              })
            }
          }
      } else {
        
        if (!el.hasClass("wow-true")) {
            
          if (scrollTop +wh > el.offset().top) {
            el.addClass("wow-true").css({
              "visibility": "visible",
              "animation-delay": delay+"s",
              "animation-name": anm
            }).removeClass("wow-fls");
            lazyLoadInstance.update();
          } 

        } 
    

      }
    
      
      
      
    

    });
  }

  lineLoadFunct = function(device) {
    $(".web_principles_line").each(function() { 
      if (device !="mobile") {
        var elementTop = $(this).offset().top;
        if (elementTop < (client_h-(client_h/10))) {
          $(this).addClass("anim_line_active")
        }
      } else {

        let scrollTop = $(window).scrollTop();
        if (scrollTop+client_h-(client_h/10)  > $(this).offset().top ) {
          $(this).addClass("anim_line_active") 
        }
      }
      
    });
  }

      wowJs("mobile");
      $(window).on("scroll", function() {
        wowJs("mobile");
        lineLoadFunct("mobile");
        lazyLoadInstance.update();
      });
  


   


 


  setTimeout(function(){$(".phone").after("<i class='delet_mask'><span>Удалить маску телефона</span></i>")}, 2000);
  $(document).on('click', ".delet_mask" , function() {
    maskLoad("delete"); 
    iti.intlTelInput("destroy");
    $(this).remove();
  });


  $('.home_blog_item_like_click:not(.home_blog_item_like_click_active)').on('click', function(e){
    e.preventDefault();
    $(this).addClass("home_blog_item_like_click_active");
    var val_int = $(this).find("span");
    val_int.text(+val_int.text()+1)
    $.ajax({
        url: "/bitrix/templates/veonix/php/like.php",
        type: "POST",
        data: {id: id_post},
        success: function(data){
          
        }
    });
  });

$('form:not(.search-from)').on('submit', function(e){
  e.preventDefault();
  var arr = $(this).serialize();
  var form = $(this);
  var phone = form.find("[type='tel']");
  if (!phone.intlTelInput("isValidNumber")) {
    phone.addClass("error_phone");
  } else {  
 
    $.ajax({
        url: "/form/send-form.php",
        type: "POST",
        data: arr,
        beforeSend: function () {
          form.trigger("reset");
          Fancybox.close();
          Fancybox.show([{
            type: "html",
            src: '<div class="message"><p class="message_1">Спасибо за заявку!</p><p class="message_2">На менеджер свяжется в Вами <br> в ближайшее время</p></div>'
          }]); 
         // ym(49319551,'reachGoal','SEND_FORM');
        },
        success: function(data){
         console.log(data);
        }
    });
  }

})



$('#bf-ck-9').on('click', function(){
  if($('#bf-ck-9').prop('checked')){    
    $( "#d-non1" ).show(200);
    $( "#d-non1 input" ).focus();
  }else{
    $( "#d-non1" ).hide(0);
    $( "#bf-ck-9-text" ).val(null);
  };
});



$("#bf-rd-4").on('change', function(){
  $( "#d-non2" ).show(200);
  $( "#d-non2 input" ).focus();
});

$('#bf-rd-4').on('deselectRadio', function() {
    $( "#d-non2" ).hide(0);
    $( "#bf-rd3-text" ).val(null);
});




});
