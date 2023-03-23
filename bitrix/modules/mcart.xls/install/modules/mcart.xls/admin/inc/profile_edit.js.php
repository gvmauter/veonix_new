<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<script type="text/javascript">
function McarXls() {}
obMcarXls = new McarXls();
obMcarXls.formAlertError = function(msg){
    alert(msg);
    setTimeout(function(){
        $('.adm-detail-content-btns .adm-btn-load-img-green, .adm-detail-content-btns .adm-btn-load-img').remove();
        $('.adm-detail-content-btns .adm-btn-load').removeClass('adm-btn-load').attr('disabled', false);
    }, 50);
    return false;
}
</script>