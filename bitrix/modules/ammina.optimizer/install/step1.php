<?

use \Bitrix\Main\Localization\Loc;

global $APPLICATION;
?>
<style type="text/css">
    .ammina-modreg-form {
        display: block;
        width: 100%;
        margin: 20px 0;
    }

    .ammina-modreg-wrapper {
        width: 100%;
        float: left;
        margin-right: -290px;
    }

    .ammina-modreg-left {
        margin-right: 290px;
        padding-right: 20px;
    }

    .ammina-modreg-right {
        width: 290px;
        float: right;
    }

    .ammina-modreg-left-text {
        display: block;
        color: #077a00;
        font-size: 14px;
        padding: 10px 0;
    }

    .ammina-modreg-left-text2 {
        display: block;
        color: #333333;
        font-size: 14px;
        padding: 10px 0;
    }

    .ammina-modreg-left-block {
        display: block;
        margin: 20px 0 10px 0;
    }

    .ammina-modreg-left-block label {
        display: block;
        color: #686868;
        font-size: 14px;
        padding: 0 0 5px 0;
    }

    .ammina-modreg-left-block input {
        font-size: 16px;
        color: #000000;
        background-color: #ffffff !important;
        border: 1px solid #b6b9be !important;
        box-shadow: inset 0 1px 3px rgba(182, 185, 190, .1) !important;
        -webkit-box-shadow: inset 0 1px 3px rgba(182, 185, 190, .1) !important;
        border-radius: 3px !important;
        width: 400px !important;;
        max-width: 100% !important;;
        min-width: 100px !important;;
        height: 40px !important;;
        padding: 0 20px !important;
    }

    .ammina-modreg-left-block input.error {
        border-color: #ff0000 !important;
    }

    .ammina-modreg-left-block-error {
        display: block;
        color: #ff0000;
        font-size: 11px;
    }

    .ammina-modreg-left-note {
        display: block;
        padding: 10px 0;
        font-size: 11px;
        color: #808080;
    }

    .ammina-modreg-left-text-rules {
        display: block;
        color: #555555;
        font-size: 12px;
        padding: 10px 0 30px 0;
    }

    .ammina-modreg-left-text-rules a {
        color: #333333;
        font-weight: bold;
    }

    .ammina-modreg-left-text-rules a:hover {
        text-decoration: none;
    }

    .ammina-modreg-left-check {
        display: block;
        margin: 20px 0 10px 0;
    }

    .ammina-modreg-left-check label {
        display: block;
        color: #686868;
        font-size: 14px;
        padding: 0 0 5px 0;
    }

    .ammina-modreg-left-quick-settings {
        display: block;
        margin: 0 0 0 20px;
    }

    .ammina-modreg-left-quick-settings .ammina-modreg-left-check {
        margin: 0;
    }

    .ammina-modreg-right-content {
        display: block;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #b6b9be !important;
        box-shadow: inset 0 1px 3px rgba(182, 185, 190, .1) !important;
        -webkit-box-shadow: inset 0 1px 3px rgba(182, 185, 190, .1) !important;
        border-radius: 3px !important;
        width: 250px;
    }

    .ammina-modreg-right-text {
        display: block;
        padding: 10px 0 10px 0;
        text-align: center;
        color: #333333;
        font-weight: bold;
        font-size: 16px;
    }

    .ammina-modreg-right-list {
        padding: 0;
        margin: 0 0 0 20px;
        list-style: none;
    }

    .ammina-modreg-right-list li {
        list-style: disclosure-closed;
        color: #077a00;
        padding: 5px 0;
        font-size: 14px;
    }

    .ammina-modreg-right-list li span {
        color: #333333;
    }

</style>
<script type="text/javascript">
	$(document).ready(function () {

	});
</script>

<form action="<?= $APPLICATION->GetCurPage() ?>" name="ammina_form_install" method="post">
	<?= bitrix_sessid_post() ?>
	<input type="hidden" name="lang" value="<?= LANG ?>">
	<input type="hidden" name="id" value="ammina.optimizer">
	<input type="hidden" name="install" value="Y">
	<input type="hidden" name="step" value="2">
	<div class="ammina-modreg-form">
		<div class="ammina-modreg-wrapper">
			<div class="ammina-modreg-left">
				<div class="ammina-modreg-left-check">
					<label><input type="checkbox" name="AFIELDS[QUICK_SETTINGS]" value="Y"
								  checked="checked"/> <?= Loc::getMessage("ammina.optimizer_INSTALLFORM_FIELD_QUICK_SETTING") ?>
					</label>
				</div>
				<div class="ammina-modreg-left-quick-settings">
					<div class="ammina-modreg-left-check">
						<label>
							<input type="checkbox" name="AFIELDS[QUICK_SITES_ALL]" value="Y"
								   checked="checked"/> <?= Loc::getMessage("ammina.optimizer_INSTALLFORM_FIELD_QUICK_SITES_ALL") ?>
						</label>
					</div>
					<?
					$b = 'sort';
					$o = 'asc';
					$rSites = CSite::GetList($b, $o);
					while ($arSite = $rSites->Fetch()) {
						?>
						<div class="ammina-modreg-left-check">
							<label>
								<input type="checkbox" name="AFIELDS[QUICK_SITES][]" value="<?= $arSite['LID'] ?>"/> [<?= $arSite['LID'] ?>] <?= $arSite['NAME'] ?>
							</label>
						</div>
						<?
					}
					?>
				</div>
				<div class="ammina-modreg-left-note">
					<?= Loc::getMessage("ammina.optimizer_INSTALLFORM_FIELDS_REQUIRED") ?>
				</div>
				<div class="ammina-modreg-left-text-rules">
					<?= Loc::getMessage("ammina.optimizer_INSTALLFORM_RULES") ?>
				</div>
			</div>
		</div>
	</div>
	<div style="clear: both;"></div>
	<input type="submit" name="inst" value="<?= GetMessage("MOD_INSTALL") ?>" id="am-install-mod"/>
</form>