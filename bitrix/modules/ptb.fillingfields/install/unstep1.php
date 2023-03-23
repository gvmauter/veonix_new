<?
#################################################
#   Company: NicLab                  	 	    #
#   Site: http://www.psdtobitrix.ru             #
#   Copyright (c) 2013-2014 NicLab              #
#################################################
?>
<?if(!check_bitrix_sessid()) return;?>
<?
IncludeModuleLangFile(__FILE__);

global $errors;

if(empty($errors)):
        echo CAdminMessage::ShowNote(GetMessage("PTB_FIELDS_MOD_UNINST_OK"));
else:
        for($i=0; $i<count($errors); $i++)
                $alErrors .= $errors[$i]."<br>";
        echo CAdminMessage::ShowMessage(Array("TYPE"=>"ERROR", "MESSAGE" =>GetMessage("PTB_FIELDS_MOD_UNINST_ERR"), "DETAILS"=>$alErrors, "HTML"=>true));
endif;
?>
<form action="<?echo $APPLICATION->GetCurPage()?>">
        <input type="hidden" name="lang" value="<?echo LANG?>">
        <input type="submit" name="" value="<?echo GetMessage("MOD_BACK")?>">
<form>