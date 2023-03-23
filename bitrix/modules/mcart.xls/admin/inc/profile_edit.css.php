<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<style type="text/css">
form#mcart_xls_profile_edit_form .MAIL_FILTER_ID > * {
    margin-top: 5px;
}
form#mcart_xls_profile_edit_form .<?=$obHtml->css_class_required?> td.<?=$obHtml->css_class_td_title?>{
    font-weight: bold;
}
form#mcart_xls_profile_edit_form select{
    min-width: 150px;
}
form#mcart_xls_profile_edit_form .table{
    width: 100%;
    border-collapse: collapse;
}
form#mcart_xls_profile_edit_form .table th{
    background: #E9F1F3;
}
form#mcart_xls_profile_edit_form .table,
form#mcart_xls_profile_edit_form .table th,
form#mcart_xls_profile_edit_form .table td{
    border: 1px solid #e0e8ea;
}
form#mcart_xls_profile_edit_form .table th,
form#mcart_xls_profile_edit_form .table td{
    padding: 5px;
}
form#mcart_xls_profile_edit_form .properties th,
form#mcart_xls_profile_edit_form .properties td{
    text-align: center;
}
form#mcart_xls_profile_edit_form .hidden {
    display: none;
}
form#mcart_xls_profile_edit_form .table input[type="text"],
form#mcart_xls_profile_edit_form .table select {
    width: 95%;
}
form#mcart_xls_profile_edit_form table.table-hover tbody tr:hover{
    background: #E9F1F3;
}
form#mcart_xls_profile_edit_form #tab_cont_step1{
    cursor: pointer;
}
form#mcart_xls_profile_edit_form .properties .set_custom_fields{
    cursor: pointer;
}
form#mcart_xls_profile_edit_form .properties .win_custom_fields_close{
    margin-top: 15px;
    cursor: pointer;
}
form#mcart_xls_profile_edit_form .properties .win_custom_fields{
    background: #ffffff;
    border: 1px solid #ebebeb;
    box-shadow: 0 0 16px 1px #333333;
    left: 0;
    margin: auto;
    width: 800px;
    max-width: 95%;
    padding: 15px;
    position: fixed;
    right: 0;
    top: 30px;
    z-index: 1000;
}
form#mcart_xls_profile_edit_form .properties .win_custom_fields table{
    border-collapse: collapse;
    width: 100%;
}
form#mcart_xls_profile_edit_form .custom_fields td{
    vertical-align: top;
}
form#mcart_xls_profile_edit_form .custom_fields input[type="text"],
form#mcart_xls_profile_edit_form .custom_fields textarea{
    box-sizing: border-box;
    width: 100%;
}
form#mcart_xls_profile_edit_form .custom_fields .field_add,
form#mcart_xls_profile_edit_form .custom_fields .field_del{
    cursor: pointer;
}
form#mcart_xls_profile_edit_form .overflow_y{
    overflow-y: auto;
    max-height: 300px;
    border-top: 1px solid #dce7ed;
    border-bottom: 1px solid #dce7ed;
}
form#mcart_xls_profile_edit_form .overflow_y_label{
    font-weight: bold;
    padding: 5px;
}
form#mcart_xls_profile_edit_form .label{
    text-align: left;
}
</style>