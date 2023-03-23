<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";
	
$strReturn = '<ul itemscope class="breadcrumbs_top" itemtype="http://schema.org/BreadcrumbList">';

$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	
	$strReturn .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"';
	$strReturn .= '>';
        if ($arResult[$index]["LINK"]) {
            $strReturn .= '<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">';
            $strReturn .= '<span itemprop="name">'.$title.'</span>';
            $strReturn .= '<meta itemprop="position" content="'.$index.'" />';
            $strReturn .= '</a>';
            $strReturn .= '</li><li><i></i></li>';
        } else {
            $strReturn .= '<p href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">';
            $strReturn .= '<span itemprop="name">'.$title.'</span>';
            $strReturn .= '<meta itemprop="position" content="'.$index.'" />';
            $strReturn .= '</p>';
            $strReturn .= '</li>';
        }
		
}

$strReturn .= '</ul>';

return $strReturn;
?>