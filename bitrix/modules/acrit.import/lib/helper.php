<?php

namespace Acrit\Import;

use Bitrix\Main\Config\Option;

class Helper
{
    /**
     *	Check updates
     */

    public static function checkModuleUpdates($strModuleID, &$intDateTo){
        $arAvailableUpdates = array();
        include_once($_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/classes/general/update_client_partner.php');
        if(class_exists('\CUpdateClientPartner')) {
            $arUpdateList = \CUpdateClientPartner::GetUpdatesList($errorMessage, LANGUAGE_ID, 'Y', array(),
                array('fullmoduleinfo' => 'Y'));
            if(is_array($arUpdateList) && is_array($arUpdateList['MODULE'])){
                foreach($arUpdateList['MODULE'] as $arModuleData){
                    if($arModuleData['@']['ID'] == $strModuleID){
                        if(preg_match('#^(\d{1,2})\.(\d{1,2})\.(\d{4})$#', $arModuleData['@']['DATE_TO'], $arMatch)){
                            $intDateTo = mktime(23, 59, 59, $arMatch[2], $arMatch[1], $arMatch[3]);
                        }
                        if(is_array($arModuleData['#']) && is_array($arModuleData['#']['VERSION'])){
                            foreach($arModuleData['#']['VERSION'] as $arVersion){
                                $arAvailableUpdates[$arVersion['@']['ID']] = $arVersion['#']['DESCRIPTION'][0]['#'];
                            }
                        }
                    }
                }
            }
        }
        return $arAvailableUpdates;
    }

    /**
     *	Show success
     */

    public static function showSuccess($strMessage=null, $strDetails=null) {
        ob_start();
        \CAdminMessage::ShowMessage(array(
            'MESSAGE' => $strMessage,
            'DETAILS' => $strDetails,
            'HTML' => true,
            'TYPE' => 'OK',
        ));
        return ob_get_clean();
    }

	/**
	 *	Show note
	 */
	public static function showNote($strNote, $bCompact=false, $bCenter=false, $bReturn=false) {
		if($bReturn){
			ob_start();
		}
		$arClass = array();
		if($bCompact){
			$arClass[] = 'acrit-exp-note-compact';
		}
		if($bCenter){
			$arClass[] = 'acrit-exp-note-center';
		}
		print '<div class="'.implode(' ', $arClass).'">';
		print BeginNote();
		print $strNote;
		print EndNote();
		print '</div>';
		if($bReturn){
			return ob_get_clean();
		}
	}

}
