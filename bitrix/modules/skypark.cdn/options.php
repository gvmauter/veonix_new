<?php
$module_id = "skypark.cdn";
$RIGHT_W = $RIGHT_R = $USER->IsAdmin();
if($RIGHT_R || $RIGHT_W) :
    
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/options.php");
IncludeModuleLangFile(__FILE__);

$arAllOptions = Array(
    array("is_active",      "checkbox"),
    array("cdn_domain",     "text"),
    array("include_mask",   "text"),
    array("exclude_mask",   "text"),
    array("exclude_dir_mask", "text"),
);

//get used sites


$aTabs = array(
    0=> array(
		"DIV" => "main",
		"TAB" => GetMessage("skypark.cdn_MAIN_TAB1"),
		"ICON" => "main_user_edit",
		"TITLE" => GetMessage("skypark.cdn_MAIN_TAB_TITLE"),
                "OPTIONS" => Array( 
                   "is_active" => Array(
                       "title"=>GetMessage("skypark.cdn_TURN_ON"), 
                       "type"=>Array("checkbox")), 
                )
              
	)
    );
$by=""; 
$order="";
$rsSites = CSite::GetList($by, $order);
while ($arSite = $rsSites->Fetch()){
    $arAllOptions[] =array("cdn_domain".$arSite["LID"], "text");
    $arAllOptions[] =array("exclude_mask".$arSite["LID"], "text");
    $arAllOptions[] =array("include_mask".$arSite["LID"], "text");
    $arAllOptions[] =array("exclude_dir_mask".$arSite["LID"], "text");
    
    $aTabs[]=array(
		"DIV" => "edit".$arSite["LID"],
		"TAB" => GetMessage("skypark.cdn_MAIN_TAB_SET")." [". $arSite["NAME"]."]",
		"ICON" => "clouds_settings",
		"TITLE" => GetMessage("skypark.cdn_MAIN_TAB_TITLE_SET")." [". $arSite["NAME"]."]",
                "OPTIONS" => Array(
                        "cdn_domain".$arSite["LID"] =>Array(
                            "title"=>GetMessage("skypark.cdn_OPTIONS_DOMAIN_NAME"), 
                            "type"=>Array("text", 40),
                            "hint"=>GetMessage("skypark.cdn_OPTIONS_DOMAIN_NAME_HINT"),
                        ),
                        "include_mask".$arSite["LID"] => Array(
                            "title"=>GetMessage("skypark.cdn_OPTIONS_MASK_INC"), 
                            "type"=>Array("textarea", 5),
                            "help"=>GetMessage("skypark.cdn_OPTIONS_MASK_INC_HELP"),
                            "hint"=>GetMessage("skypark.cdn_OPTIONS_MASK_INC_HINT"),
                        ),
                        "exclude_mask".$arSite["LID"] => Array(
                            "title"=>GetMessage("skypark.cdn_OPTIONS_MASK_EXC"), 
                            "type"=>Array("textarea", 5),
                            "help"=>GetMessage("skypark.cdn_OPTIONS_MASK_EXC_HELP"),
                            "hint"=>GetMessage("skypark.cdn_OPTIONS_MASK_EXC_HINT"),
                        ),
                         "exclude_dir_mask".$arSite["LID"] => Array(
                            "title"=>GetMessage("skypark.cdn_OPTIONS_MASK_DIR_EXC"), 
                            "type"=>Array("textarea", 5),
                            "help"=>GetMessage("skypark.cdn_OPTIONS_MASK_DIR_EXC_HELP"),
                            "hint"=>GetMessage("skypark.cdn_OPTIONS_MASK_DIR_EXC_HINT"),
                        ),
                    )
                );
    
}
$tabControl = new CAdminTabControl("tabControl", $aTabs);

CModule::IncludeModule($module_id);

if (
	$_SERVER["REQUEST_METHOD"] === "POST"
	&& (
		isset($_REQUEST["Update"])
		|| isset($_REQUEST["Apply"])
		|| isset($_REQUEST["RestoreDefaults"])
	)
	&& $RIGHT_W
	&& check_bitrix_sessid()
)
{
    if (isset($_REQUEST["RestoreDefaults"]))
	{
            COption::RemoveOption($module_id);
            
	}
	else
	{
                $bVarsFromForm = true;
		foreach ($arAllOptions as $arOption)
		{
			$name = $arOption[0];
			$val = trim($_REQUEST[$name], " \t\n\r");
                        if($name=="cdn_domain"){
                            $domain_regex="(([a-zA-Z]{1})|([a-zA-Z]{1}[a-zA-Z]{1})|([a-zA-Z]{1}[0-9]{1})|([0-9]{1}[a-zA-Z]{1})|([a-zA-Z0-9][-_\.a-zA-Z0-9]{1,61}[a-zA-Z0-9]))\.([a-zA-Z]{2,6}|[a-zA-Z0-9-]{2,30}\.[a-zA-Z]{2,13})";
                            preg_match("/		
                                        ((?:https?:\/+|\/\/)?)
                                        ((?:".$domain_regex.")?)

                                        /x", 
                                    $val, 
                                    $matches);
                            if(count($matches)){
                                $val=$matches[2];
                            }
                        }
                        
			if ($arOption[1]== "checkbox" && $val != "Y"){
                            $val = "N";
                            cCustomCDN::stop();
                        }else if ($arOption[1]== "checkbox" && $val == "Y"){
                            cCustomCDN::SetActive();
                        }else{
                            COption::SetOptionString($module_id, $name, $val, false);
                        }
		}
	}

	ob_start();
	$Update = $Update.$Apply;
	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights2.php");
	ob_end_clean();

	if (isset($_REQUEST["back_url_settings"]))
	{
		if(
			isset($_REQUEST["Apply"])
			|| isset($_REQUEST["RestoreDefaults"])
		)
			LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($module_id)."&lang=".urlencode(LANGUAGE_ID)."&back_url_settings=".urlencode($_REQUEST["back_url_settings"])."&".$tabControl->ActiveTabParam());
		else
			LocalRedirect($_REQUEST["back_url_settings"]);
	}
	else
	{
		LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($module_id)."&lang=".urlencode(LANGUAGE_ID)."&".$tabControl->ActiveTabParam());
	}
}
?>

<form method="post" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=urlencode($module_id)?>&amp;lang=<?=LANGUAGE_ID?>">
<?
$tabControl->Begin();
$iter=0;
$hintiter=0;
foreach($aTabs as $key=>$tab):
$tabControl->BeginNextTab();
    foreach($tab["OPTIONS"] as $name => $arOption):
    	//if ($bVarsFromForm)
	//		$val = $_POST[$name];
	//	else
		$val = COption::GetOptionString($module_id, $name);
		$type = $arOption["type"];
		$disabled = array_key_exists("disabled", $arOption)? $arOption["disabled"]: "";
		//if (isset($_REQUEST["
	?>
        <? if ($iter == 0): ?>
            <tr>
                <td colspan="2" align="center">
                    <div class="adm-info-message-wrap" align="center">
                        <div class="adm-info-message" style="text-align:left"><?= GetMessage("SKYPARK_CDN_INTRO_DESCR"); ?></div>
                    </div>
                </td>
            </tr>
        <? endif; ?>
    
		<tr <?if(isset($arOption["for"])) echo 'style="display:none" class="show-for-'.htmlspecialcharsbx($arOption["for"]).'"'?>>
			<td width="40%" <?if($type[0]=="textarea") echo 'class="adm-detail-valign-top"'?>>
                                <?
                                    if(isset($arOption["hint"])):
                                    $hintiter++;    
                                    
                                ?>
                                    <span id="hint_help_<?=$hintiter?>"></span>
                                    <script>
                                       BX.hint_replace(
                                            BX('hint_help_<?=$hintiter?>'), 
                                            '<?echo CUtil::JSEscape($arOption["hint"])?>'
                                       );
                                    </script>

                                <?endif?>
				<label for="<?echo htmlspecialcharsbx($name)?>"><?echo $arOption["title"]?></label>
                                <?if(isset($arOption["help"])):?>
                                <p style="font-size: smaller;color: gray;"><?=$arOption["help"]?></p>
                                <?endif?>
			<td width="60%">
				<?if($type[0]=="checkbox"):
                        $val=  cCustomCDN::IsActive()?"Y":"N";
                    ?>
					<input type="checkbox" name="<?echo htmlspecialcharsbx($name)?>" id="<?echo htmlspecialcharsbx($name)?>" value="Y"<?if($val=="Y")echo" checked";?><?if($disabled)echo' disabled="disabled"';?>><?if($disabled) echo '<br>'.$disabled;?>
				<?elseif($type[0]=="text"):?>
					<input type="text" size="<?echo $type[1]?>" maxlength="255" value="<?echo htmlspecialcharsbx($val)?>" name="<?echo htmlspecialcharsbx($name)?>">
				<?elseif($type[0]=="textarea"):?>
					<textarea rows="<?echo $type[1]?>" name="<?echo htmlspecialcharsbx($name)?>" style=
					"width:100%"><?echo htmlspecialcharsbx($val)?></textarea>
				<?elseif($type[0]=="select"):?>
					<select name="<?echo htmlspecialcharsbx($name)?>" onchange="doShowAndHide()">
					<?foreach($type[1] as $key => $value):?>
						<option value="<?echo htmlspecialcharsbx($key)?>" <?if ($val == $key) echo 'selected="selected"'?>><?echo htmlspecialcharsEx($value)?></option>
					<?endforeach?>
					</select>
				<?elseif($type[0]=="note"):?>
					<?echo BeginNote(), $type[1], EndNote();?>
				<?endif?>
			</td>
		</tr>
    <?php endforeach;
    if($iter>0):
            ?>
            <tr><td colspan="2">
                <div>
                    <span ><a target="_blank" href="https://support.edgecenter.ru/knowledge_base/item/258059"><?=GetMessage("SKYPARK_CDN_UZNATQ_BOLQSE")?></a></span>
                </div>
            </td></tr>
        <?
    endif;
    $iter++;
    endforeach;

    $tabControl->Buttons();?>
        <input <?if(!$RIGHT_W) echo "disabled" ?> type="submit" name="Update" value="<?=GetMessage("MAIN_SAVE")?>" title="<?=GetMessage("MAIN_OPT_SAVE_TITLE")?>" class="adm-btn-save">
        <input <?if(!$RIGHT_W) echo "disabled" ?> type="submit" name="Apply" value="<?=GetMessage("MAIN_OPT_APPLY")?>" title="<?=GetMessage("MAIN_OPT_APPLY_TITLE")?>">
        <?if(strlen($_REQUEST["back_url_settings"])>0):?>
            <input <?if(!$RIGHT_W) echo "disabled" ?> type="button" name="Cancel" value="<?=GetMessage("MAIN_OPT_CANCEL")?>" title="<?=GetMessage("MAIN_OPT_CANCEL_TITLE")?>" onclick="window.location='<?echo htmlspecialcharsbx(CUtil::addslashes($_REQUEST["back_url_settings"]))?>'">
            <input type="hidden" name="back_url_settings" value="<?=htmlspecialcharsbx($_REQUEST["back_url_settings"])?>">
        <?endif?>
        <input <?if(!$RIGHT_W) echo "disabled" ?> type="submit" name="RestoreDefaults" title="<?echo GetMessage("MAIN_HINT_RESTORE_DEFAULTS")?>" OnClick="confirm('<?echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>')" value="<?echo GetMessage("MAIN_RESTORE_DEFAULTS")?>">
        <?=bitrix_sessid_post();?>
    <?$tabControl->End();?>
</form>


<?php endif;?>