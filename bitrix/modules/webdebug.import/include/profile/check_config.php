<?
IncludeModuleLangFile(__FILE__);
$objConfig = new CWDI_CheckConfig($arFields,$arHandler);
$arConfigResults = $objConfig->GetConfigArray();
$bHasConfigErrors = $objConfig->HasErrors();
?>
<table class="adm-detail-content-table">
	<tbody>
		<tr>
			<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=WdiHint(GetMessage('WDI_HANDLER_CHECK_CONFIG_HINT'));?> <?=GetMessage('WDI_HANDLER_CHECK_CONFIG');?></td>
			<td class="adm-detail-content-cell-r" width="60%" valign="top">
				<div>
					<?if($bHasConfigErrors):?>
						<span class="wdi_check_config_n"><b>&nbsp;<?=GetMessage('WDI_HANDLER_CHECK_CONFIG_ERROR');?></b></span>
					<?else:?>
						<span class="wdi_check_config_y"><b>&nbsp;<?=GetMessage('WDI_HANDLER_CHECK_CONFIG_SUCCESS');?></b></span> <a href="#" class="wdi_inline_link wdi_check_config_details"><?=GetMessage('WDI_HANDLER_CHECK_CONFIG_DETAILS');?></a>
						<script>
						$('a.wdi_check_config_details').click(function(E){
							E.preventDefault();
							$('.wdi_check_config').toggleClass('hidden');
						});
						</script>
					<?endif?>
				</div>
				<table class="wdi_check_config<?if(!$bHasConfigErrors):?> hidden<?endif?>">
					<tbody>
						<?foreach($arConfigResults as $Key => $arConfig):?>
							<tr>
								<td><?=$arConfig['NAME'];?>:</td>
								<td><?if($arConfig['RESULT']):?><span class="wdi_check_config_y"><?=GetMessage('WDI_Y');?></span><?else:?><span class="wdi_check_config_n"><?=GetMessage('WDI_N');?></span><?endif?></td>
								<td><?if(!empty($arConfig['HELP'])):?><?=WdiHint($arConfig['HELP']);?><?endif?></td>
							</tr>
						<?endforeach?>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<hr/>