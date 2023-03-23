$(document).ready(function () { 
  $(document).on('click', ".srvc_box_top" , function() {
 
    
    if ($(this).next(".srvc_box_center").length >0) {
      if (!$(this).parents(".srvc_box_item").hasClass("srvc_active")) {
        $(this).parents(".srvc_box_item").addClass("srvc_active")
        $(this).parents(".srvc_box_item").find(".srvc_box_center").show(300)
      } else {
        $(this).parents(".srvc_box_item").find(".srvc_box_center").hide(300)
        $(this).parents(".srvc_box_item").removeClass("srvc_active")
  
      }
    }
    
  });
});