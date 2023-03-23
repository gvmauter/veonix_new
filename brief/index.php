<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/veonix.png");

$APPLICATION->SetPageProperty("description", "Заполните бриф, чтобы более точно поставить задачу нашим дизайнерам, сэкономить свое и наше время и как следствие сделать максимально удачный проект.");
$APPLICATION->SetPageProperty("title", "Бриф на разработку графического дизайна — veonix.ru");

 
$APPLICATION->AddChainItem("Бриф");
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/brif.css");   

$APPLICATION->SetTitle("Бриф на разработку
графического дизайна");

 
?>


<? $APPLICATION->IncludeComponent(
    "bitrix:main.include","",
      Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/bitrix/templates/veonix/php/title_demo.php"
      )
);

 ?>
<div class="old_page">
    <div class="main">
        <section class="old_page_template page-news page-in"> 
       
                       
<main class="cd-main-content brif-page">  
	<div class="block-top no-padding-bottom">
				
		<div class="main">
		  
				<p class="brif_opis wow fadeInUp"><span >Перед началом разработки проекта предлагаем вам заполнить небольшой бриф, чтобы сразу найти общий язык и вести предметный диалог. Мы считаем это обязательным этапом продуктивного сотрудничества.</span></p><p class="brif_opis wow fadeInUp"><span >Почему заполнение брифа — важный шаг на пути к результату?</span></p><ul class="brif_opis wow fadeInUp"><li  class="brif_opis wow fadeInUp" aria-level="1"><span >вы сможете взглянуть на проект под другим углом: разложить его на составляющие, выделить наиболее важные позиции, добавить новых идей и представить ожидаемый результат</span></li><li  aria-level="1"><span >мы сможем сформировать корректное понимание задачи: эффективно проработать ваши потребности, предостеречь возможные возражения клиентов, создать подходящий дизайн </span></li><li  aria-level="1"><span >меньше времени уйдет на согласование деталей и решение спорных вопросов, больше — на активную разработку проекта и достижение цели</span></li></ul><p class="brif_opis wow fadeInUp"><span >На вопросы без вариантов ответа предоставляйте информацию в свободной форме. Рекомендуем давать максимально развернутые ответы и в конце брифа прикреплять материалы, которые будут полезны при разработке. Чем больше информации, тем сильнее ваш будущий проект.</span></p><p class="brif_opis wow fadeInUp"><span >Какие-то вопросы вызывают затруднения? Смело обращайтесь к нам за разъяснениями. </span></p><p class="brif_opis wow fadeInUp"><span >Все ваши данные под защитой. Мы гарантируем полную конфиденциальность представленной информации.</span></p>
				</div>

      				<p class="brif_opis wow fadeInUp">Заполнив бриф, Вы не только лишний раз проанализируете будущий проект, но и будете четко представлять себе его окончательный вид. Качественно заполненный бриф – экономит массу времени и сил, расходуемых, как правило, на согласовании деталей.</p>
			<p class="brif_opis wow fadeInUp">Пожалуйста, отвечайте на вопросы развернуто, в свободной форме. Если какие-либо<br>
				из вопросов анкеты покажутся сложными, обратитесь к нам за разъяснениями.<br> 
				Мы гарантируем полную конфиденциальность представленной Вами информации </p>	
						</div>
							</div>
		</div>
	
</main>

<section class="brif_b1">
	<div class="main">
		<div class="main-760">
			<div class="box_brif_b1">
            <form class="upload_form" id="upload_form" method="post" class="bxs-gx">
					<input type="hidden" name="fileUrl" class="fileUrl">
					<input type="hidden" name="idForm" value="brief">
					<div class="brif-checked">
						<p class="brif-zg brif-zg_min">Если у вас есть материалы, которые понадобятся при разработке дизайна<br> 
							(бренд-бук, логотип, фотографии, тексты и пр.) обязательно приложите<br> 
							их к данному брифу, либо отправьте дополнительно на почту<br> 
							<a href="mailto:info@veonix.ru">info@veonix.ru</a></p>
						<div class="box_form" id="drag-and-drop-zone">
							<div class="box_form_icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" viewBox="0 0 459.73 510" fill="#b49d72"><path class="a" d="M427.48,314.33l-37.72-37.72L220,106.88A80,80,0,0,0,106.88,220L276.61,389.81a17.78,17.78,0,1,0,25.14-25.15L132,194.89A44.45,44.45,0,1,1,194.89,132L364.66,301.75l37.72,37.72a80,80,0,0,1-113.2,113.16l-31.43-31.44-176-176L69.16,232.61A115.59,115.59,0,0,1,232.61,69.16L421.19,257.75a17.78,17.78,0,1,0,25.15-25.14L257.75,44A151.13,151.13,0,0,0,44,257.75L232.61,446.34l31.47,31.44a115.58,115.58,0,0,0,163.4-163.45Z"></path></svg>
							</div>
							<p class="box_form_text">Перетащите файлы, для отправки  <br> (max 100 mb)</p>
							<p class="box_form_bt">ИЛИ ДОБАВЬТЕ</p>
							<input type="file" name="file_input" title='Click to add Files' />
						</div>
						<ul id="files" class="load_files"></ul>
										


						<p class="brif-zg">Что нужно разработать?</p>
						<div class="brif-checked_box">
							<div class="checked_box_column">
								<div class="ch-text">
									<input type="checkbox" name="bf-ck-1" id="bf-ck-1" value="Сайт"><label for="bf-ck-1"><div class="ch-icon"></div>Сайт</label>
								</div>
								<div class="ch-text">
									<input type="checkbox" name="bf-ck-4" id="bf-ck-4" value="Презентация"><label for="bf-ck-4"><div class="ch-icon"></div>Презентация</label>
								</div>
								<div class="ch-text">
									<input type="checkbox" name="bf-ck-7" id="bf-ck-7" value="Маркетинг-кит"><label for="bf-ck-7"><div class="ch-icon"></div>Маркетинг-кит</label>
								</div>
							</div>
							<div class="checked_box_column">
								<div class="ch-text">
									<input type="checkbox" name="bf-ck-2" id="bf-ck-2" value="Коммерческое предложение"><label for="bf-ck-2"><div class="ch-icon"></div>Коммерческое предложение</label>
								</div>
								<div class="ch-text">
									<input type="checkbox" name="bf-ck-5" id="bf-ck-5" value="Логотип"><label for="bf-ck-5"><div class="ch-icon"></div>Логотип</label>
								</div>
								<div class="ch-text">
									<input type="checkbox" name="bf-ck-8" id="bf-ck-8" value="Бренд-бук"><label for="bf-ck-8"><div class="ch-icon"></div>Бренд-бук</label>
								</div>
							</div>
							<div class="checked_box_column">
								<div class="ch-text">
									<input type="checkbox" name="bf-ck-3" id="bf-ck-3" value="Видеоролик"><label for="bf-ck-3"><div class="ch-icon"></div>Видеоролик</label>
								</div>
								<div class="ch-text">
									<input type="checkbox" name="bf-ck-6" id="bf-ck-6" value="Каталог"><label for="bf-ck-6"><div class="ch-icon"></div>Каталог</label>
								</div>
								<div class="ch-text">
									<input type="checkbox" name="bf-ck-9" id="bf-ck-9" value="Другое"><label for="bf-ck-9"><div class="ch-icon"></div>Другое</label>
									<div class="dop-pole" id="d-non1" style="display: none;">
									  <input type="text" name="bf-ck-9-text" id="bf-ck-9-text" placeholder="Введите свой вариант">
									</div>
							   </div>
							</div>	
						</div>
						<p class="brif-zg">Чем занимается ваша компания?</p>
						<textarea class="brif-textarea brif-textarea_min" placeholder="Производим электронное измерительное оборудование" name="bf1" required=""></textarea>
						<p class="brif-zg">Кто ваши клиенты? </p>
						<textarea class="brif-textarea brif-textarea_min" placeholder="Руководители отдела закупок промышленных предприятий, занимающихся металлообработкой" name="bf2" required=""></textarea>
						<p class="brif-zg">Задачи, которые будет решать данный проект?</p>
						<textarea class="brif-textarea" placeholder="Привлекать новых клиентов, создать узнаваемый стиль для нашей ауддитории, увеличить продажи, сделать продукт более привлекательным и стильным, повысить уровень доверия" name="bf3" required=""></textarea>
						<div class="brif-radio_box">
							<div class="brif-radio_box_column">
								<div class="brif-rd">
									<p class="brif-zg radio_zg">Есть ли логотип? </p>
									<div class="brief-radio">
										<div class="rd_text">        
											<input type="radio" name="bf-rd1" id="bf-rd1.1" value="Да"><label for="bf-rd1.1"><div class="rd-icon"></div>Да</label>
										</div>
										<div class="rd_text">        
											<input type="radio" name="bf-rd1" id="bf-rd1.2" value="Нет"><label for="bf-rd1.2"><div class="rd-icon"></div>Нет</label>
										</div>
									</div>
								 </div>
								 <div class="brif-rd">
									<p class="brif-zg radio_zg">Потребуется ли<br> 
										разработка текстов?</p>
									<div class="brief-radio">
										<div class="rd_text">        
											<input type="radio" name="bf-rd3" id="bf-rd3.1" value="Да"><label for="bf-rd3.1"><div class="rd-icon"></div>Да</label>
										</div>
										<div class="rd_text">        
											<input type="radio" name="bf-rd3" id="bf-rd3.2" value="Нет"><label for="bf-rd3.2"><div class="rd-icon"></div>Нет</label>
										</div>
									</div>
								</div>
							</div>
							<div class="brif-radio_box_column">
								<div class="brif-rd">
									<p class="brif-zg radio_zg">Есть ли брендбук?</p>
									<div class="brief-radio">
										<div class="rd_text">        
											<input type="radio" name="bf-rd2" id="bf-rd2.1" value="Да"><label for="bf-rd2.1"><div class="rd-icon"></div>Да</label>
										</div>
										<div class="rd_text">        
											<input type="radio" name="bf-rd2" id="bf-rd2.2" value="Нет"><label for="bf-rd2.2"><div class="rd-icon"></div>Нет</label>
										</div>
									</div>
								</div>
								<div class="brif-rd">
									<p class="brif-zg radio_zg">Потребуется ли<br>
										фотосессия?</p>
									<div class="brief-radio">
										<div class="rd_text">        
											<input type="radio" name="bf-rd4" id="bf-rd4.1" value="Да"><label for="bf-rd4.1"><div class="rd-icon"></div>Да</label>
										</div>
										<div class="rd_text">        
											<input type="radio" name="bf-rd4" id="bf-rd4.2" value="Нет"><label for="bf-rd4.2"><div class="rd-icon"></div>Нет</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<p class="brif-zg">Описание будущего стиля<br> 
							(солидно, ярко, динамично и т.д.)</p>
						<textarea class="brif-textarea brif-textarea_min" placeholder="Строгий премиум стиль (Luxury)" name="bf3-1" required=""></textarea>

						<p class="brif-zg">В какой цветовой гамме Вы видите свой проект?<br>
							Назовите 2-3 основных цвета</p>
						<textarea class="brif-textarea brif-textarea_min" placeholder="Серые тона с синим акцентом (голубой)" name="bf4" required=""></textarea>
						
						<p class="brif-zg">Впечатление, которое должен произвести<br> 
							дизайн на пользователя</p>
						<textarea class="brif-textarea brif-textarea_min" placeholder="Надежная солидная компания, которой можно доверять." name="bf5" required=""></textarea>
						
						<p class="brif-zg">Приложите ссылки на работы, которые Вам нравятся.<br> 
							Можно выбрать из нашего <a href="/portfolio/" target="_blank" >портфолио</a></p>
						<textarea class="brif-textarea brif-textarea_min" placeholder="" name="bf6" required=""></textarea>
						
						<p class="brif-zg">Есть ли у вас идеи, которые Вы хотите воплотить в дизайне?</p>
						<textarea class="brif-textarea brif-textarea_min" placeholder="Хотелось бы сделать наш прибор в разрезе и указать стрелочками из чего он состоит." name="bf7" required=""></textarea>
						
						<p class="brif-zg">Что Вы категорически не хотите видеть в дизайне?</p>
						<textarea class="brif-textarea brif-textarea_min" placeholder="Человечков в несерьезном мультипликационном стиле " name="bf8" required=""></textarea>

						<p class="brif-zg">Какой размер макета (только для полиграфической продукции): формат А3, А4, А5 и пр. Книжная или альбомная ориентация?</p>
						<textarea class="brif-textarea brif-textarea_min" placeholder="Размеры макета и ориентация" name="bf8-1" ></textarea>
						
						<p class="brif-zg">Дополнительные комментарии, вопросы, пожелания</p>
						<textarea class="brif-textarea brif-textarea_min" placeholder="Комментарий" name="bf9" required=""></textarea>
						
			
	
						<div class="brif_form">
							<div class="about-input">
                                <input type="hidden" name="region" class="region" value="Russia (Россия)">
								<input type="hidden" name="theme" value="Заполнение брифа">
								<input  type="text" name="name" placeholder="ФИО" ym-record-keys>
                                <input type="tel"  name="phone"  placeholder="8 (912) 345-67-89" autocomplete="off" required="" class="phone phone_3" ym-record-keys>

								<input  type="text" name="name-company" placeholder="Компания" ym-record-keys>
								<input  type="email" name="email" placeholder="Email" required="" ym-record-keys>
							</div>
							<div class="brif-bt">
								<button type="submit" name="submit" class="but_7" >отправить бриф</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>



 
 
     
        </section>
    </div>
</div>
 
<script type="text/html" id="files-template">
  <li class="media">
    <div class="media-body">
      <p>
        <span class="fili_names" style="font-weight: bold;">%%filename%%</span>  Статус: <b class="text-muted">Ожидает отправки</b>
      </p>
      <div class="progress">
        <div class="progress-bar " 
          role="progressbar"
          style="width: 0%" 
          aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
        </div>
      </div>
    </div>
  </li>
</script>

<? 
$asset->addJs(SITE_TEMPLATE_PATH."/assets/js/old/form/bootstrap.min.js" );
$asset->addJs(SITE_TEMPLATE_PATH."/assets/js/old/form/jquery.dm-uploader.js" );
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/js/old/form/jquery.dm-uploader.css");    

$asset->addJs(SITE_TEMPLATE_PATH."/assets/js/old/form/demo-ui.js" );
$asset->addJs(SITE_TEMPLATE_PATH."/assets/js/old/form/demo-config.js" );
?>
<script>

$(document).ready(function() {

    $(".brif-file-input").change(function(){ 
        $("#result").empty();
        $(".brif-bt").removeClass("no-active-brife");
        $(".sz-error").hide();
        var name_file = [], size_file = [], size_true = []; 			
        for(var i = 0; i < $(this).get(0).files.length; ++i) {
        
            name_file.push($(this).get(0).files[i].name);
            size_file.push($(this).get(0).files[i].size); 
        } 			
        $("#result").text(name_file.join(", ")); 
        console.log(size_file.length);
        
        
        for(var is = 0; is < size_file.length; ++is) {
            
            if (size_file[is] <= "31457280") {
                console.log("true");
                size_true.push("true"); 
                
            } else {
                console.log("false");
                size_true.push("false"); 
            }
    
        } 
        console.log(size_true);
        
        for (var ir = 0; ir < size_true.length; ir++) {
            if (size_true[ir] == "false") {
                $(".brif-bt").addClass("no-active-brife");
                $(".sz-error").show();
            }
        }
        
    });
    
});

</script>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>