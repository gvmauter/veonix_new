<?php
$moduleId = "acrit.import";
require_once( $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php" );

use Bitrix\Main\SystemException,
    Acrit\Import;

IncludeModuleLangFile(__FILE__);

$moduleStatus = CModule::IncludeModuleEx( $moduleId );
if( $moduleStatus == MODULE_DEMO_EXPIRED ){
    $buyLicenceUrl = "https://www.acrit-studio.ru/market/module/acrit.import/?action=BUY&id=154854";
    require_once( $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php" );?>
    <div class="adm-info-message">
        <div class="acrit_note_button">
            <a href="<?=$buyLicenceUrl?>" target="_blank" class="adm-btn adm-btn-save"><?=GetMessage( "ACRIT_IMPORT_DEMOEND_BUY_LICENCE_INFO" )?></a>
        </div>
        <div class="acrit_note_text"><?=GetMessage( "ACRIT_IMPORT_DEMOEND_PERIOD_INFO" );?></div>
        <div class="acrit_note_clr"></div>
    </div>
<?}
else{
    require_once( $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/$moduleId/include.php" );

    CModule::IncludeModule( $moduleId );

    CUtil::InitJSCore( array( "ajax", "jquery" ) );
    $APPLICATION->AddHeadScript( "/bitrix/js/iblock/iblock_edit.js" );
    $APPLICATION->AddHeadScript( "/bitrix/js/$moduleId/main.js" );
    $t = CJSCore::getExtInfo( "jquery" );

    if( !is_array( $t ) || !isset( $t["js"] ) || !file_exists( $DOCUMENT_ROOT.$t["js"] ) ){
        $APPLICATION->ThrowException( GetMessage( "ACRIT_IMPORT_JQUERY_REQUIRE" ) );
    }

    $POST_RIGHT = $APPLICATION->GetGroupRight( $moduleId );
    if( $POST_RIGHT == "D" )
	    $APPLICATION->AuthForm( GetMessage( "ACCESS_DENIED" ) );

    if( !CModule::IncludeModule( "iblock" ) ){
	    return false;
    }

    IncludeModuleLangFile( __FILE__ );

    $sTableID = "tbl_acrit_import_profile";

    function CheckFilter()
    {
        global $FilterArr, $lAdmin;
        foreach ($FilterArr as $f) {
            global $$f;
        }

        return count($lAdmin->arFilterErrors) == 0;
    }

    $oSort = new CAdminSorting( $sTableID, "ID", "desc" );
    $lAdmin = new CAdminList( $sTableID, $oSort );
    $obProfile = new Acrit\Import\ProfileTable();

    $FilterArr = array(
        "find_id",
        "find_name",
        "find_active",
        "find_type",
//        "find_type_run",
        "find_timestamp",
        "find_start_last_time",
    );

    $lAdmin->InitFilter( $FilterArr );
    if (CheckFilter()) {
        $arFilter = array(
//            "ID" => $find_id,
//            "NAME" => $find_name,
//            "ACTIVE" => $find_active,
//            "TYPE" => $find_type,
//            "TIMESTAMP_X" => $find_timestamp,
//            "START_LAST_TIME" => $find_start_last_time,
        );
        if (isset($find_id)) {
            $arFilter['ID'] = $find_id;
        }
        if (isset($find_id)) {
            $arFilter['NAME'] = $find_name;
        }
        if (isset($find_id)) {
            $arFilter['ACTIVE'] = $find_active;
        }
        if (isset($find_id)) {
            $arFilter['TYPE'] = $find_type;
        }
        if (isset($find_id)) {
            $arFilter['TIMESTAMP_X'] = $find_timestamp;
        }
        if (isset($find_id)) {
            $arFilter['START_LAST_TIME'] = $find_start_last_time;
        }
    }

    // Bulk edit
    if( $lAdmin->EditAction() && ( $POST_RIGHT == "W" ) ){
        if( is_array( $FIELDS ) && !empty( $FIELDS ) ){
            foreach( $FIELDS as $ID => $arFields ){
                if( !$lAdmin->IsUpdated( $ID ) ){
                    continue;
                }

                $DB->StartTransaction();
                $ID = IntVal($ID);
                $res = $obProfile->update( $ID, $arFields );
                if (!$res->isSuccess()) {
                    $lAdmin->AddUpdateError( GetMessage( "export_save_err" ).$ID.": ".implode(' ', $res->getErrorMessages()), $ID );
                    $DB->Rollback();
                }
                $DB->Commit();
            }
        }
    }

    // Group actions
    if( ( $arID = $lAdmin->GroupAction() ) && $POST_RIGHT == "W" ){
        // if selected "for all elements"
        if( $_REQUEST["action_target"] == "selected" ){
            $rsData = $obProfile->getList(array(
                'order' => array( $by => $order ),
                'filter' => $arFilter
            ));

            while( $arRes = $rsData->fetch() ){
                $arID[] = $arRes["ID"];
            }
        }

        if( is_array( $arID ) && !empty( $arID ) ){
            foreach( $arID as $ID ){
                if( strlen( $ID ) <= 0 )
                    continue;

                $ID = IntVal( $ID );

                switch( $_REQUEST["action"] ){
                    case "delete":
                        @set_time_limit( 0 );
                        $DB->StartTransaction();

//                        CExportproplusAgent::DelAgent( $ID );
                        if($obProfile->Delete($ID)){
                            // Delete fields map
                            $obProfileFields = new Import\ProfileFieldsTable();
                            $res = $obProfileFields->getList(array(
                                'order' => array('ID' => 'asc'),
                                'filter' => array('PARENT_ID' => $ID),
                            ));
                            while ($arField = $res->fetch()) {
                                $obProfileFields->delete($arField['ID']);
                            }
                        }
                        else {
                            $DB->Rollback();
                            $lAdmin->AddGroupError( GetMessage( "rub_del_err" ), $ID );
                        }

                        $DB->Commit();
                        break;

                    case "activate":
                    case "deactivate":
                        if( ( $rsData = $obProfile->getById( $ID ) ) ){
                            $arData["ACTIVE"] = ( $_REQUEST["action"] == "activate" ? "Y" : "N" );

//                            if( $rsData["SETUP"]["TYPE_RUN"] == "cron" ){
//                                if( $rsData["ACTIVE"] != "Y" ){
//                                    CExportproplusAgent::DelAgent( $ID );
//                                }
//                                else{
//                                    CExportproplusAgent::AddAgent( $ID );
//                                }
//                            }
//                            else{
//                                CExportproplusAgent::DelAgent( $ID );
//                            }

                            if( !$obProfile->update( $ID, $arData ) ){
                                $lAdmin->AddGroupError( GetMessage( "rub_save_error" ).$obProfile->LAST_ERROR, $ID );
                            }
                        }
                        else
                            $lAdmin->AddGroupError( GetMessage( "rub_save_error" )." ".GetMessage( "rub_no_rubric" ), $ID );
                        break;
                }
            }
        }
    }

    $lAdmin->AddHeaders(
        array(
            array(
                "id" => "ID",
                "content" => "ID",
                "sort" => "ID",
                "align" => "right",
                "default" => true,
            ),
            array(
                "id" => "ACTIVE",
                "content" => GetMessage( "import_active" ),
                "sort" => "ACTIVE",
                "align" => "left",
                "default" => true,
            ),
            array(
                "id" => "NAME",
                "content" => GetMessage( "IMPORT_LIST_NAME" ),
                "sort" => "NAME",
                "default" => true,
            ),
            array(
                "id" => "TYPE",
                "content" => GetMessage( "import_type" ),
                "sort" => "TYPE",
                "default" => true,
            ),
//            array(
//                "id" => "TYPE_RUN",
//                "content" => GetMessage( "import_type_run" ),
//                "sort" => "type_run",
//                "default" => true,
//            ),
            array(
                "id" => "TIMESTAMP_X",
                "content" => GetMessage( "import_updated" ),
                "sort" => "TIMESTAMP_X",
                "default" => true,
            ),
            array(
                "id" => "START_LAST_TIME",
                "content" => GetMessage( "import_start_last_time" ),
                "sort" => "START_LAST_TIME",
                "default" => true,
            ),
        )
    );

    $rsData = $obProfile->getList(array(
        'order' => array($by=>$order),
        'filter' => $arFilter,
    ));

    $rsData = new CAdminResult( $rsData, $sTableID );

    $rsData->NavStart();
    $lAdmin->NavText( $rsData->GetNavPrint( GetMessage( "import_nav" ) ) );

    while( $arRes = $rsData->NavNext( true, "f_" ) ){
//        $f_SETUP = unserialize( base64_decode( $f_SETUP ) );
//
//        $exportTimeStamp = MakeTimeStamp( $f_SETUP["LAST_START_EXPORT"] );
//        $profileTimeStamp = MakeTimeStamp( $arRes["TIMESTAMP_X"] );
//
        if( $arRes["ACTIVE"] != "Y" ){
            $statVal = "<div style='display: inline-block; width: 12px; height: 12px; margin: 3px 7px 0px 0px; border-radius: 50%; background: #a4a4a4;'></div> ".GetMessage( "import_unloaded_offers_stat_unactive" );
        }
//        elseif( !$exportTimeStamp ){
//            $statVal = "<div style='display: inline-block; width: 12px; height: 12px; margin: 3px 7px 0px 0px; border-radius: 50%; background: #ff6600;'></div> ".GetMessage( "import_unloaded_offers_stat_generate" );
//        }
//        elseif( file_exists( $_SERVER["DOCUMENT_ROOT"]."/bitrix/tools/".$moduleId."/export_{$arRes["ID"]}_run.lock" ) ){
//            $statVal = "<div style='display: inline-block; width: 12px; height: 12px; margin: 3px 7px 0px 0px; border-radius: 50%; background: #ede73c;'></div> ".GetMessage( "import_unloaded_offers_stat_in_process" );
//        }
//        elseif( $exportTimeStamp < $profileTimeStamp ){
//            $statVal = "<div style='display: inline-block; width: 12px; height: 12px; margin: 3px 7px 0px 0px; border-radius: 50%; background: #ff6600;'></div> ".GetMessage( "import_unloaded_offers_stat_regenerate" );
//        }
//        else{
//            if( $f_SETUP["TYPE_RUN"] == "comp" ){
//                $statVal = "<div style='display: inline-block; width: 12px; height: 12px; margin: 3px 7px 0px 0px; border-radius: 50%; background: #00cc33;'></div> ".GetMessage( "import_unloaded_offers_stat_finished" );
//            }
//            else{
//                $maxCronProducts = 0;
//                if( is_array( $f_SETUP["CRON"] ) && !empty( $f_SETUP["CRON"] ) ){
//                    foreach( $f_SETUP["CRON"] as $cronIndex => $arCronRow ){
//                        if( $arCronRow["MAXIMUM_PRODUCTS"] > $maxCronProducts ){
//                            $maxCronProducts = $arCronRow["MAXIMUM_PRODUCTS"];
//                        }
//                    }
//                }
//
//                if( !$maxCronProducts ){
//                    $statVal = "<div style='display: inline-block; width: 12px; height: 12px; margin: 3px 7px 0px 0px; border-radius: 50%; background: #00cc33;'></div> ".GetMessage( "import_unloaded_offers_stat_finished" );
//                }
//                else{
//                    $unloandedPercent = floor( $arRes["UNLOADED_OFFERS_CORRECT"] / $maxCronProducts * 100 );
//                    if( $unloandedPercent >= 100 ){
//                        $statVal = "<div style='display: inline-block; width: 12px; height: 12px; margin: 3px 7px 0px 0px; border-radius: 50%; background: #00cc33;'></div> ".GetMessage( "import_unloaded_offers_stat_finished" );
//                    }
//                    else{
//                        $statVal = "<div style='display: inline-block; width: 12px; height: 12px; margin: 3px 7px 0px 0px; border-radius: 50%; background: #0099cc;'></div> ".GetMessage( "import_unloaded_offers_stat_in_process_begin" )." ".$arRes["UNLOADED_OFFERS_CORRECT"]." ".GetMessage( "import_unloaded_offers_stat_in_process_end" ).$unloandedPercent;
//                    }
//                }
//            }
//        }

        $row = & $lAdmin->AddRow( $f_ID, $arRes );
        $row->AddViewField( "NAME", '<a href="acrit.import_edit.php?ID='.$f_ID."&amp;lang=".LANG.'" title="'.GetMessage( "import_act_edit" ).'">'.$f_NAME."</a>" );
        $row->AddInputField( "NAME", array( "size" => 20 ) );
//        $row->AddViewField( "START_LAST_TIME", $f_SETUP["LAST_START_EXPORT"] );
//        $row->AddViewField( "START_NEXT_TIME", ( ( $f_TYPE_RUN == "cron" ) ? CExportproplusAgent::GetNextAgentTime( $f_ID ) : "" ) );
//        $row->AddViewField( "UNLOADED_OFFERS_STAT", $statVal );
//        $row->AddViewField( "UNLOADED_OFFERS_SITE", $arRes["LID"] );
//        $row->AddViewField( "TYPE_RUN", $f_TYPE_RUN == "comp" ? GetMessage( "ACRIT_IMPORT_RUN_TYPE_COMPONENT" ) : GetMessage( "ACRIT_IMPORT_RUN_TYPE_CRON" ) );

        $arActions = array();
        if( $POST_RIGHT == "W" ){
            $arActions[] = array(
                "ICON" => "edit",
                "DEFAULT" => true,
                "TEXT" => GetMessage( "import_act_edit" ),
                "ACTION" => $lAdmin->ActionRedirect( "acrit.import_edit.php?ID=".$f_ID )
            );
        }

        if( $POST_RIGHT == "W" ){
            $arActions[] = array(
                "ICON" => "delete",
                "TEXT" => GetMessage( "import_act_del" ),
                "ACTION" => "if(confirm('".GetMessage( "import_act_del_conf" )."')) ".$lAdmin->ActionDoGroup( $f_ID, "delete" )
            );
        }

//        if( $POST_RIGHT == "W" ){
//            $arActions[] = array(
//                "ICON" => "copy",
//                "DEFAULT" => true,
//                "TEXT" => GetMessage( "import_act_copy" ),
//                "ACTION" => $lAdmin->ActionRedirect( "acrit.import_edit.php?copy=$f_ID&ID=$f_ID" )
//            );
//        }
//
//        if( file_exists( $_SERVER["DOCUMENT_ROOT"]."/bitrix/tools/$moduleId/export_{$arRes["ID"]}_run.lock" ) ){
//            if( $POST_RIGHT == "W" ){
//                $arActions[] = array(
//                    "ICON" => "unlock",
//                    "DEFAULT" => true,
//                    "TEXT" => GetMessage( "import_act_unlock" ),
//                    "ACTION" => "UnlockExportExpress( ".$arRes["ID"]." );".$lAdmin->ActionRedirect( "acrit.import_list.php" )
//                );
//            }
//        }
//
//        if( !file_exists( $_SERVER["DOCUMENT_ROOT"]."/bitrix/tools/$moduleId/export_{$arRes["ID"]}_run.lock" )
//            && ( $f_SETUP["TYPE_RUN"] == "comp" ) ){
//            if( $POST_RIGHT == "W" ){
//                $runRow = "/bitrix/tools/$moduleId/acrit.import.php?ID=".$arRes["ID"];
//
//                $arActions[] = array(
//                    "ICON" => "run",
//                    "DEFAULT" => true,
//                    "TEXT" => GetMessage( "import_act_run" ),
//                    "ACTION" => "window.open( '$runRow', '_blank' ); return false;"
//                );
//            }
//        }
//
//        if( $POST_RIGHT == "W" ){
//            $arActions[] = array(
//                "ICON" => "export",
//                "DEFAULT" => true,
//                "TEXT" => GetMessage( "import_act_export" ),
//                "ACTION" => $lAdmin->ActionRedirect( "acrit.import_export.php?URL_DATA_FILE_EXPORT=/upload/acrit.import_dump_".time().".txt&export_import=export&step=2&ID=$f_ID" )
//            );
//        }

        $arActions[] = array( "SEPARATOR" => true );
        if( is_set( $arActions[count( $arActions ) - 1], "SEPARATOR" ) ){
            unset( $arActions[count( $arActions ) - 1] );
        }

        $row->AddActions( $arActions );
    }

    $lAdmin->AddFooter(
        array(
            array(
                "title" => GetMessage( "MAIN_ADMIN_LIST_SELECTED" ),
                "value" => $rsData->SelectedRowsCount()
            ),
            array(
                "counter" => true,
                "title" => GetMessage( "MAIN_ADMIN_LIST_CHECKED" ),
                "value" => "0"
            ),
        )
    );

    $lAdmin->AddGroupActionTable(
        array(
            "delete" => GetMessage( "MAIN_ADMIN_LIST_DELETE" ),
            "activate" => GetMessage( "MAIN_ADMIN_LIST_ACTIVATE" ),
            "deactivate" => GetMessage( "MAIN_ADMIN_LIST_DEACTIVATE" ),
        )
    );

    $aContext = array(
        array(
            "TEXT" => GetMessage( "PROFILE_ADD_TITLE" ),
            "LINK" => "acrit.import_edit.php?lang=".LANG,
            "TITLE" => GetMessage( "PROFILE_ADD_TITLE" ),
            "ICON" => "btn_new",
        ),
    );

    $lAdmin->AddAdminContextMenu( $aContext );
    $lAdmin->CheckListMode();


    $APPLICATION->SetTitle( GetMessage( "post_title" ) );

    require_once( $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php" );

    // Send message and show progress
    if( isset( $_REQUEST["import_end"] ) && $_REQUEST["import_end"] == 1 && isset( $_REQUEST["import_id"] ) && $_REQUEST["import_id"] > 0 ){
        if( isset( $_GET["SUCCESS"][0] ) ){
            foreach( $_GET["SUCCESS"] as $success ){
                CAdminMessage::ShowMessage(
                    array(
                        "MESSAGE" => $success,
                        "TYPE" => "OK"
                    )
                );
            }
        }

        if( isset( $_GET["ERROR"][0] ) ){
            foreach( $_GET["ERROR"] as $error ){
                CAdminMessage::ShowMessage( $error );
            }
        }
    }

    //AcritLicence::Show();

    // Notify if has updates
    include 'include/update_notifier.php';

    echo BeginNote();
    echo GetMessage( "ACRIT_TIME_ZONES_DIFF_DATE" );
    echo EndNote();

    $lAdmin->DisplayList();
}?>

<?require( $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php" );?>