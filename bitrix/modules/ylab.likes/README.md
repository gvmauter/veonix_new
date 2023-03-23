## ylab.likes

������ ��������� ���������� ������/��������� ��� ����� ��������� �������.

�����������: [Alexandr Zemlyanoy (Galamoon)](https://github.com/Galamoon)

# API
ID ���� �������� ������������ ����������� � ������ ������� 
### php
* ORM ����� `Ylab\Likes\YlabLikesTable`
  * ���������
    * `VoteDislike` - �������� ��������
    * `VoteLike` - �������� �����
  * ������
    * `public static function setLike($iContentId, $iContentType, $iUserId)` - ������ ������ ������ ���� (����)
       * `$iContentId` - ID ��������
       * `$iContentType` - ID ���� �������� 
       * `$iUserId` - ID ������������ �� ����� �������� ����� ����� �����
    * `public static function setDislike($iContentId, $iContentType, $iUserId)` - ������ ������ ������ ���� (�������)
       * `$iContentId` - ID ��������
       * `$iContentType` - ID ���� �������� 
       * `$iUserId` - ID ������������ �� ����� �������� ����� ����� �����
    * `public static function getContentStat($mContentId, $iContentType, $iUserLike = null)` - �������� ������ � ���������� ������� ��������
       * `$mContentId` - ID ��� ������ ID ��������.
       * `$iContentType` - �� ���� ��������
       * `$iUserLike` - (��������������) ID ������������ ��� �������� ����� �������� �������� ��� ������

### js
����������� ���������� js `CJSCore::Init(['YlabLikesForm']);`
* ���������� `YlabLikesForm`
  * ������
    * `BX.Ylab.Likes.setAjaxPath(AjaxPath)` - �������� ���� � php ������������ �������
      * `AjaxPath` - �� ���������
        ```json
        {
            "setLike": "/bitrix/themes/ylab.likes/ajax/setLike.php",
            "setDislike": "/bitrix/themes/ylab.likes/ajax/setDislike.php",
            "getContentStat": "/bitrix/themes/ylab.likes/ajax/getContentStat.php"
        }
        ```
    * `BX.Ylab.Likes.setLike(iContentId, iContentType, oCallback)` - ������ ������ ������ ���� (����) �� ����� �������� ������������
       * `iContentId` - ID ��������
       * `iContentType` - ID ���� ��������
       * `oCallback` - ������� ������� ����� ������� ����� �������� �������
    * `BX.Ylab.Likes.setDislike(iContentId, iContentType, oCallback)` - ������ ������ ������ ���� (�������) �� ����� �������� ������������
       * `iContentId` - ID ��������
       * `iContentType` - ID ���� ��������
       * `oCallback` - ������� ������� ����� ������� ����� �������� �������
    * `BX.Ylab.Likes.getContentStat(iContentId, iContentType, oCallback)` - �������� ������ � ���������� ������� �������� � ������ �������� ������������
       * `iContentId` - ID ��������
       * `iContentType` - ID ���� ��������
       * `oCallback` - ������� ������� ����� ������� ����� �������� �������

### Bitrix component
��������� ��� �������� ��� ����������� ��� ������ ������. ������ ������������� ����������. 
```php
<?
$APPLICATION->IncludeComponent("ylab:likes", "", [
    'ELEMENT_ID' => '' /* ID �������� */,
    'ENTITY_ID' => ''/* ID ���� �������� */,
    'HIDDEN_DISLIKE' => 'N' / *Y - �������� ������� */
]);
?>
```

## ���������
* ������� ����� � ������� ������.
* ����������� ����� � ���������� /local/modules/ylab.likes
* ������� � ������� ����� � Marketplace (������������� �������) � ���������� ������.
* ������� � ������� ���������� (� ������� � ������ ��������) ��������� "ylab:likes".

������ ����������:

```php
<div class="block">
	<?foreach($arResult["ITEMS"] as $arItem){?>
		<div class="item">
			<div class="img"></div>
			<div class="name"><?=$arItem['NAME']?></div>
			<div class="bottom">
				<?
				$APPLICATION->IncludeComponent("ylab:likes", "", [
					'ELEMENT_ID' => $arItem['ID'],
					'ENTITY_ID' => $arParams['IBLOCK_ID'],
					'HIDDEN_DISLIKE' => 'N'
				]);
				?>
			</div>
		</div>
	<?}?>
</div>
```
