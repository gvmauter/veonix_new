<?
CWDI_Handler::IncludeLangFile(__FILE__);
if($_GET['subaction']=='show_format_table' && $_GET['sheet']==$SheetIndex){CWDI::StopOutputBuffering();}
?>

<div><?=GetMessage('WDI_NO_SETTINGS_NEED');?></div><br/>

<?if($_GET['subaction']=='show_format_table' && $_GET['sheet']==$SheetIndex){die();}?>