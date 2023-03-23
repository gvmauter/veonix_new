<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<section class="news_nav wow animate__animated" data-wow="fadeInDownBig" >
  <div class="main">
    <a href="#" class="bt_nav lf">Вернуться назад</a>
    <a href="#" class="bt_nav rg">Следующая новость</a>
  </div>
</section>
<section class="news_b1 wow animate__animated" data-wow="fadeInUp">
  <div class="main">
    <div class="news_b1_top lazy" data-bg="/bitrix/templates/veonix/assets/img/news/b1_bg.jpg">
      <h1 class="h1">Новый поселок<br> закончил строительство!</h1>
    </div>
    <div class="news_b1_stat">
      <p class="news_b1_stat_date">04.02.22</p>
      <div class="news_b1_stat_text">
        <p class="news_b1_stat_text_zg">Красногорский район считается одним из лучших для покупки загородной недвижимости в Подмосковье, так что неудивительно, что именно там находятся самые статусные и престижные объекты.</p>
        <p>Его главными преимуществами являются достаточно благополучная экологическая обстановка, прекрасно развитая транспортная и социальная инфраструктура, а недостатком — высокая стоимость участков и домов. Наша компания реализует в Красногорском районе два амбициозных девелоперских проекта, и предлагает покупателям и инвесторам загородную недвижимость по выгодным ценам.</p>
        <p>Камерный коттеджный поселок-комьюнити, расположенный в непосредственной близости от столицы (добраться до него по скоростной Новой Риге можно за 15 минут), и органично вписанный в природный ландшафт вблизи деревни Поздняково. В 2021 году он был признан лучшим реализованным проектом на международном конкурсе НОРПИЗ, и впечатляет оригинальными дизайнерскими и инженерными решениями. Жилая застройка выполнена в скандинавской стилистике с применением натуральных материалов. В проектах домов предусмотрены открытые террасы и эксплуатируемая кровля, что расширяет функционал объектов и предоставляет новые возможности для комфортного отдыха. А в комплекте с домом покупатель получает гараж или оборудованные машиноместа.</p>
        <div class="news_b1_stat_text_img">
          <img src="/bitrix/templates/veonix/assets/img/news/st_1.jpg" width="354" height="354">
          <img src="/bitrix/templates/veonix/assets/img/news/st_2.jpg" width="354" height="354">
          <img src="/bitrix/templates/veonix/assets/img/news/st_3.jpg" width="354" height="354">
        </div>
        <p>Его главными преимуществами являются достаточно благополучная экологическая обстановка, прекрасно развитая транспортная и социальная инфраструктура, а недостатком — высокая стоимость участков и домов. Наша компания реализует в Красногорском районе два амбициозных девелоперских проекта, и предлагает покупателям и инвесторам загородную недвижимость по выгодным ценам.</p>
        <p>Камерный коттеджный поселок-комьюнити, расположенный в непосредственной близости от столицы (добраться до него по скоростной Новой Риге можно за 15 минут), и органично вписанный в природный ландшафт вблизи деревни Поздняково. В 2021 году он был признан лучшим реализованным проектом на международном конкурсе НОРПИЗ, и впечатляет оригинальными дизайнерскими и инженерными решениями.</p>
      </div>
      
    </div>
  </div>
</section>

<section class="news_b2">
  <div class="main">
    <h2 class="h2 wow animate__animated" data-wow="fadeInUpBig">Вам может быть интересно</h2>
    <div class="press_b2_box ">
      <div class="press_b2_block" data-block="news">
        <div class="press_b2_item wow animate__animated" data-wow="fadeInUp">
          <a href="/press/item/" class="press_b2_photo lazy" data-bg="/bitrix/templates/veonix/assets/img/news/b2_1.jpg">
          </a>
          <a href="/press/item/" class="press_b2_title">новость компании юником</a>
          <p>Каждый день на объектах компании Unicom Development происходят события, которые приближают наших покупателей</p>
        </div>

        <div class="press_b2_item wow animate__animated" data-wow="fadeInUp">
          <a href="/press/item/" class="press_b2_photo lazy" data-bg="/bitrix/templates/veonix/assets/img/news/b2_2.jpg">
          </a>
          <a href="/press/item/" class="press_b2_title">новость компании юником</a>
          <p>Каждый день на объектах компании Unicom Development происходят события, которые приближают наших покупателей</p>
        </div>

        <div class="press_b2_item wow animate__animated" data-wow="fadeInUp">
          <a href="/press/item/" class="press_b2_photo lazy" data-bg="/bitrix/templates/veonix/assets/img/news/b2_3.jpg">
          </a>
          <a href="/press/item/" class="press_b2_title">новость компании юником</a>
          <p>Каждый день на объектах компании Unicom Development происходят события, которые приближают наших покупателей</p>
        </div>
      </div>
    </div>
  </div>
</section>




        <div class="news_page_list_box">
          <div class="news_list_item wow fadeInUp" data-wow-duration="2s">
            <div class="news_list_item_main">
              
              <div class="news_list_item_text">
                <div class="news_list_item_img">
                  <div  <?if(!empty($arResult["DETAIL_PICTURE"]["SRC"])) { ?> style="background-size: cover; background-position: center;background-image: url('<?=$arResult["DETAIL_PICTURE"]["SRC"]?>');"<? } ?>></div>
                </div>
                <h1 class="news_list_item_name"><?=$arResult["NAME"]?></h1>
                <?echo $arResult["DETAIL_TEXT"];?>
      
              </div>
              <div class="news_prev_prev">
                <a href="/news/">Назад в блог</a>
              </div>
              
            </div>
          </div>

        </div>









	<?
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
