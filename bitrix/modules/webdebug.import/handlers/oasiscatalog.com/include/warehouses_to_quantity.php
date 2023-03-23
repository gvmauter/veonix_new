<?
CWDI_Handler::IncludeLangFile(__FILE__);
$arParams = $arFields['PARAMS']['S'][0];

if(empty($arFields['HANDLER']) || !is_array($arData['HANDLERS'][$arFields['HANDLER']]) || empty($arData['HANDLERS'][$arFields['HANDLER']])) {
	return;
}


$arWarehouses = array();
$bGetFileError = false;
if(class_exists('XMLReader')) {
	$obOasisCatalog = new CWDI_OasisCatalog($arFields, $arData['HANDLERS'][$arFields['HANDLER']]);
	$obOasisCatalog->SetSkipLoadingFiles(true);
	if ($obOasisCatalog->GetFile('warehouses')) {
		$XMLReader = new XMLReader();
		$XMLReader->Open($obOasisCatalog->arFiles['warehouses']['FILE_ABS']);
		while($XMLReader->Read()) {
			if($XMLReader->nodeType == XMLReader::ELEMENT) {
				if($XMLReader->localName=='item') {
					$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
					$ID = (string)$obXML->id;
					$Name = (string)$obXML->name;
					if(!CWDI::IsUtf()){
						$Name = CWDI::ConvertCharset($Name);
					}
					$arWarehouses[$ID] = $Name;
					unset($obXML);
				}
			}
		}
		$XMLReader->Close();
	} else {
		$bGetFileError = true;
	}
	unset($XMLReader);
}


?>
<tr id="wdi_WAREHOUSES_TO_QUANTITY">
	<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=WdiHint(GetMessage('WDI_PARAM_WAREHOUSES_TO_QUANTITY_HINT'));?> <?=GetMessage('WDI_PARAM_WAREHOUSES_TO_QUANTITY');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div>
			<?if($bGetFileError):?>
				<?=GetMessage('WDI_PARAM_WAREHOUSES_TO_QUANTITY_ERROR_GET_FILE');?>
			<?else:?>
				<?foreach($arWarehouses as $WarehouseID => $Value):?>
					<div style="margin-bottom:2px;">
						<input type="hidden" name="PARAMS[S][0][WAREHOUSES_TO_QUANTITY][<?=$WarehouseID;?>]" value="N" />
						<input type="checkbox" name="PARAMS[S][0][WAREHOUSES_TO_QUANTITY][<?=$WarehouseID;?>]" id="wdi_warehouses_to_quantity_<?=$WarehouseID;?>" value="Y" <?if(is_array($arParams['WAREHOUSES_TO_QUANTITY']) && $arParams['WAREHOUSES_TO_QUANTITY'][$WarehouseID]=='Y'):?> checked="checked"<?endif?> />
						<label for="wdi_warehouses_to_quantity_<?=$WarehouseID;?>"><?=$Value;?></label>
						<script>BX.adminFormTools.modifyCheckbox(BX('wdi_warehouses_to_quantity_<?=$WarehouseID;?>'));</script>
					</div>
				<?endforeach?>
			<?endif?>
		</div>
	</td>
</tr>
