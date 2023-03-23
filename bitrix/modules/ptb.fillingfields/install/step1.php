<?
#################################################
#   Company: NicLab                  	 	    #
#   Site: http://www.psdtobitrix.ru             #
#   Copyright (c) 2013-2014 NicLab              #
#################################################
?>
<?=bitrix_sessid_post()?>
<?
IncludeModuleLangFile(__FILE__);
global $errors;

if(is_array($errors) && count($errors)>0):
	foreach($errors as $val)
		$alErrors .= $val."<br>";
	echo CAdminMessage::ShowMessage(Array("TYPE"=>"ERROR", "MESSAGE" =>GetMessage("PTB_FIELDS_MOD_INST_ERR"), "DETAILS"=>$alErrors, "HTML"=>true));
else:
	echo CAdminMessage::ShowNote(GetMessage("PTB_FIELDS_MOD_INST_OK"));
endif;
?>
<form action="<?echo $APPLICATION->GetCurPage()?>">
	<input type="hidden" name="lang" value="<?echo LANG?>">
	<input type="submit" name="" value="<?echo GetMessage("MOD_BACK")?>">
<form>