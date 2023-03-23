<?
$skypark_cdn_default_option = array(
    'is_active'=>'N'
);

$by=""; 
$order="";
$rsSites = CSite::GetList($by, $order);
while ($arSite = $rsSites->Fetch()){
    $skypark_cdn_default_option['include_mask'.$arSite["LID"]]="css;js;jpg;jpeg;png;svg;ico;ogg;gif";
    $skypark_cdn_default_option['exclude_mask'.$arSite["LID"]]="";
    $skypark_cdn_default_option['cdn_domain'.$arSite["LID"]]="";
    $skypark_cdn_default_option['your_domains'.$arSite["LID"]]="";
    $skypark_cdn_default_option['cdn_domain'.$arSite["LID"]] = "";
    $skypark_cdn_default_option['exclude_dir_mask'.$arSite["LID"]]="";
}

?>