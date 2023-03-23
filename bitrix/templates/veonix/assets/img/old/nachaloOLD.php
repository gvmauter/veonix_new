<?php
use yii\helpers\Html;
// use app\modules\event\models\UserProducts;

require_once(get_template_directory() . '/includes/class-event-nachalo.php');

$form = new puzatForms( (new EventNachalo())->FORMID );

require_once(get_template_directory() . '/includes/classes/OfferManager.php');
$offerManager = OfferManager::getInstance();

if ($dateShow = get_post_meta($post->ID,"wpcf-date_event_text",true)) {

} else {
    $date_event = get_post_meta($post->ID,"wpcf-date_event",true);
    $dateShow = $date_event ? date('j', $date_event).' '.$rus_months[date('n', $date_event)-1].' '.date('Y', $date_event) : '';
}

get_template_part('header_landing', 'index'); ?>

    <?php include('landings_overlay.php'); ?>
    <?php global $clientVersion; ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/pages/pages_css/nachalo-new.css?ver=<?=$clientVersion;?>">

    <div class="b__content marafon2">
        <section class="marafon2-first-block b__start marafon2-first-block_nachalo">
            <div class="b-start-head">
                <strong class="b-item1">марафон</strong>
                <div id="firstBlockStepNachaloText" class="b-item2">Пошаговый курс для начинающих в сайтах</div>
                <h1 class="b-item3">Н А Ч А Л О</h1>
            </div>
            <div class="b-bg-mountains"></div>
            <div id="firstBlockIncomeNachaloText" class="marafon2-first-block__description"> СОЗДАЙТЕ ИНФОРМАЦИОННЫЙ САЙТ С ДОХОДОМ  ОТ 10 000 РУБ. В МЕСЯЦ, <br>без технического образования и опыта в сайтах</div>
            <div id="firstBlockStartNachaloText" class="marafon2-first-block__date">
                Старт марафона - <?= $dateShow ?>
                <?php /* <div class="marafon2-first-block__already-selling">Продажи скоро откроются</div> */ ?>
            </div>
            <div class="b-start-button-container m--taCenter">


                <?php /*if ($offerManager->offerIsAllowed($form->form['id_f'])) { ?>

                    <?php /** выбор пакетов для офферов *//* ?>
                    <a href="<?= $form->form['url_packages'].'?eventPackages='.$form->form['id_f'] ?>" class="m--white">выбрать пакет</a>

                <?php } else { ?>

                    <?php if(checkSentPackage($form->form['events'])){ ?>

                        <?php /** Выбор пакетов ??? *//* ?>
                        <?php  ?>
                        <a href="<?= $form->form['url_packages'].'?eventPackages='.$form->form['id_f'] ?>" class="m--white">выбрать пакет</a>
                        <?php  ?>

                    <?php } else { ?>

                        <?php /** Кнопка-якорь для формы предрегистрации *//* ?>
                        <a href="#prinyat_uchastie" class="anchor-btn m--white">принять участие</a>

                    <?php } ?>

                <?php }*/ ?>

                <?php

                $buttonConfig = getEventButtonConfig($form);

                if ($buttonConfig) {
                    echo Html::a('Купить курс', $buttonConfig['url'], $buttonConfig['options']);
                }

                ?>
    

                <a href="#podrobnee" class="anchor-btn m--white">Подробнее о курсе</a>
            </div>
            <div class="b-video-block" id="podrobnee">
                <div class="b-container">
                    <div class="b-video-wrapper">
                        <div class="b-video-contayner m-video-prev1">
                            <a class="b-video-play landing-video-popup" href="https://youtu.be/mOyRvix1tlg"></a>
                        </div>
                        <div class="b-video-title marafon2-video-title">
                            Узнать
                            <br> об этом курсе
                            <br>
                            <strong>всего за <br>несколько минут</strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="b__offer" id="afterFirstBlock">
            <h2>что вам даст марафон Начало</h2>
            <div class="b-offer-block">
                <div class="b-offer-item m--offer-item1">
                    <div class="b-item1">
                        <div class="b-item2">
                            <div class="b-offer-img1"></div>
                        </div>
                    </div>
                    <strong>Готовый <br>информационный сайт</strong>
                    <p>По окончанию курса у вас на руках будет <br>сайт с несколькими статьями готовый <br>для дальнейшего роста.</p>
                </div>
                <div class="b-offer-item m--offer-item2">
                    <div class="b-item1">
                        <div class="b-item2">
                            <div class="b-offer-img2"></div>
                        </div>
                    </div>
                    <strong>Дополнительный <br>источник дохода</strong>
                    <p>Освоите базовые методы заработка на сайтах, которые сможете применить уже во время курса и получить первые деньги.</p>
                </div>
                <div class="b-offer-item m--offer-item3">
                    <div class="b-item1">
                        <div class="b-item2">
                            <div class="b-offer-img3"></div>
                        </div>
                    </div>
                    <strong>Методика и пошаговые<br> инструкции</strong>
                    <p>Научитесь создавать новые сайты
                        <br> самостоятельно и сможете превратить это
                        <br> дело в основной источник дохода в будущем.</p>
                </div>
                <div class="b-offer-item m--offer-item4">
                    <div class="b-item1">
                        <div class="b-item2">
                            <div class="b-offer-img4"></div>
                        </div>
                    </div>
                    <strong>Важные практические <br>навыки</strong>
                    <p>Получите востребованную профессию вебмастера, навыки контент-менеджера и SEO-специалиста. Научитесь правильно делегировать задачи.</p>
                </div>
            </div>
        </section>
        <section class="b__banner full-h-b" data-scrollax-parent="true">
            <div class="cover m--bg1" data-scrollax="properties: { translateY: '20%' }"></div>
            <div class="b-item1 text centralize">
                <div class="b-item2">
                    Вы создадите прочный фундамент
                    <br>для развития сайта и роста вашего дохода
                </div>
            </div>
        </section>
        <section class="b__result">
            <h2>Когда и какие результаты <br>вы получите</h2>
            <div class="b-result-container m--table">
                <div class="m--table-cell b-result-item">
                    <strong class="b-item1">Готовый сайт</strong>
                    <div class="b-item2 m--result-item1">
                        <div>Готовый сайт с первыми статьями после курса.</div>
                        <span>1</span>
                    </div>
                    <div class="b-item3">1 мес.</div>
                </div>
                <div class="m--table-cell b-result-item">
                    <strong class="b-item1">первые деньги</strong>
                    <div class="b-item2 m--result-item2">
                        <div>Получите первых посетителей и первые деньги.</div>
                        <span>2</span>
                    </div>
                    <div class="b-item3">2 - 3 мес. </div>
                </div>
                <div class="m--table-cell b-result-item">
                    <strong class="b-item1">доход от 10 000 руб. в месяц</strong>
                    <div class="b-item2 m--result-item3">
                        <div>Продолжите развивать сайт — вырастут трафик и доход.</div>
                        <span>3</span>
                    </div>
                    <div class="b-item3"> 4 - 12 мес. </div>
                </div>
                <div class="m--table-cell b-result-item">
                    <strong class="b-item1">доход более<br>100 000 руб. в мес.</strong>
                    <div class="b-item2 m--result-item4">
                        <div>Масштабирование, рост в доходах и дальнейшее развитие с Пузат.ру</div>
                        <span>4</span>
                    </div>
                    <div class="b-item3">2 - 4 года </div>
                </div>
            </div>
        </section>
        <section class="b__banner full-h-b" data-scrollax-parent="true">
            <div class="cover m--bg2" data-scrollax="properties: { translateY: '20%' }"></div>
            <div class="b-item1 text centralize">
                <div class="b-item2">
                    ПЕРВЫЕ ДЕНЬГИ — ЧЕРЕЗ 2-3 МЕСЯЦА ПОСЛЕ СОЗДАНИЯ САЙТА.<br> ДОХОД ОТ 10 000 РУБ. В МЕСЯЦ — ЧЕРЕЗ 4-12 МЕСЯЦЕВ
                </div>
            </div>
        </section>
        <section class="b__marafon-start">
            <h2>Марафон Начало — <br>курс понятный каждому</h2>
            <div class="b-container">
                <ul class="b-marafon-start-list">
                    <li class="b-item1">Все сложные моменты рассказываем просто</li>
                    <li class="b-item2">Наглядно показываем, что и как делать - вам нужно только повторять за учителем</li>
                    <li class="b-item3">Отвечаем на все вопросы во время уроков и после</li>
                    <li class="b-item4">Даем домашние задания, чтобы вы сразу же закрепили ключевые моменты курса на практике</li>
                    <li class="b-item5">Основные темы кратко и емко раскрываем в записи. Чтобы глубже раскрыть важные темы, есть онлайн-уроки и онлайн-сессии ответов на ваши вопросы</li>
                </ul>
            </div>
        </section>
        <section class="b__banner full-h-b" data-scrollax-parent="true">
            <div class="cover m--bg3" data-scrollax="properties: { translateY: '20%' }"></div>
            <div class="b-item1 text centralize">
                <div class="b-item2">
                    Не нужно обладать техническими знаниями
                    <br> Научим всему с нуля и за руку приведём к результату
                </div>
            </div>
        </section>
        <section class="b__course-structure courseStructure">
            <h2>Подробная структура курса</h2>
            <div class="b__subHead">16 основных уроков в записи и онлайн,<br> а также бонусные онлайн-встречи с Золотыми Марафонцами</div>
            <div id="slider" class="nachalo2-course-slider">
                <div id="slide-wrapper">
                    <div class="slide m--table" data-target="1">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">1</div>
                                <div class="big-number-w__lessn-name">Вводный</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Рынок информационных сайтов, сколько и как на них можно заработать.</li>
                                    <li>Почему сайт может делать каждый.</li>
                                    <li>Путь роста в сайтах.</li>
                                    <li>Выбор направления сайта.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Получите понимание темы информационных сайтов, увидите свои перспективы в заработке на сайтах.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="2">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">2</div>
                                <div class="big-number-w__lessn-name">Генерация ниш</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Что такое таблица реинвеста и для чего она вам нужна.</li>
                                    <li>Порядок подбора ниши.</li>
                                    <li>Где искать идеи по нишам для вашего сайта.</li>
                                    <li>Что такое Яндекс Вордстат, как его использовать.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Разберетесь, что такое ниша сайта, соберете 50+ идей тематик для будущего сайта.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="3">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">3</div>
                                <div class="big-number-w__lessn-name">Фильтрация ниш</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Перевод коммерческой ниши в информационную.</li>
                                    <li>Проверка сезонности и объема ниши.</li>
                                    <li>Поиск и анализ потенциальных конкурентов, выявление их сильных и слабых сторон.</li>
                                </ul>
                                <strong class="b-item1">Домашнее задание</strong>
                                <p>Собрать и отфильтровать 20 ниш для сайта на основе ваших интересов, компетенций, бюджета, ситуации на рынке.</p>
                                <strong class="b-item1">Результат</strong>
                                <p>Научитесь генерировать ниши и отсеивать неподходящие. Получите нишу для запуска сайта, лично одобренную Романом Пузатом.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="4">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">4</div>
                                <div class="big-number-w__lessn-name">Регистрация домена и хостинга</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Принципы работы современного сайта.</li>
                                    <li>Что такое домен, как его выбрать.</li>
                                    <li>Как выбрать хостинг, не тратя лишних денег, и привязать к нему домен.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Научитесь подбирать правильные домены с точки зрения удобства и продвижения. Выберете хостинг и свяжете его с выбранным доменом.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="5">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">5</div>
                                <div class="big-number-w__lessn-name">Установка CMS Wordpress и добавление информации на главную на основе готовой сборки</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Что такое система управления сайтом (CMS), как установить CMS Wordpress.</li>
                                    <li>Обзор возможностей вашего нового сайта: меню, публикации, рубрики, метки, виджеты и др.</li>
                                    <li>Установка плагинов на сайт.</li>
                                </ul>
                                <strong class="b-item1">Домашнее задание</strong>
                                <p>Зарегистрировать домен и установить готовую сборку на сайт по инструкции.</p>
                                <strong class="b-item1">Результат</strong>
                                <p>Первый этап создания сайта пройден: у вас есть адрес вашего сайта (домен), оплаченный хостинг, установлена сборка — на сайте есть главная страница.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="6">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">6</div>
                                <div class="big-number-w__lessn-name">Семантика: подбор вводных слов</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Что такое семантическое ядро, и почему оно лежит в основе информационного сайта.</li>
                                    <li>Виды ключевых слов.</li>
                                    <li>Пример кусочка ядра.</li>
                                    <li>Как работает Яндекс.Wordstat.</li>
                                    <li>Этапы подготовки проекта по сбору ядра.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Научитесь работать с сервисом Яндекс.Wordstat, базами и справочниками для сбора ключевых слов сайта.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="7">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">7</div>
                                <div class="big-number-w__lessn-name">Семантика: парсинг и чистка ключей</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Сбор вводных слов для семантического ядра.</li>
                                    <li>Как работать в Key Collector. Знакомство и работа с самой важной программой на этапе семантики.</li>
                                    <li>Алгоритм первичной чистки ядра, работа с неявными дублями.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Соберете ключи для семантического ядра и проведете первичную чистку.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="8">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">8</div>
                                <div class="big-number-w__lessn-name">Семантика: разгруппировка</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Что такое группы ключей, как они связаны с будущими статьями.</li>
                                    <li>Ручная и автоматическая группировка ядра.</li>
                                    <li>Как правильно разбивать ядро на группы, какие есть подводные камни.</li>
                                    <li>Разбор на практике и примеры сложных моментов.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Завершите рутинный, но самый важный этап: составление готового для написания статей семантического ядра.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="9">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">9</div>
                                <div class="big-number-w__lessn-name">Составление идеального ТЗ + добавление проекта в проверку конкуренции</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Как с готовым семантическим ядром писать статьи самому или с привлечением авторов.</li>
                                    <li>Какие ключевые фразы и сколько раз нужно употребить в статье.</li>
                                    <li>Как сформировать понятное ТЗ для авторов.</li>
                                    <li>Как работать с сервисом tz.binet.pro.</li>
                                </ul>
                                <strong class="b-item1">Домашнее задание</strong>
                                <p>Составите 5 технических заданий и отправите их на проверку.</p>
                                <strong class="b-item1">Результат</strong>
                                <p>Составите ТЗ на первые статьи самостоятельно или с помощью нашего сервиса.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="10">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">10</div>
                                <div class="big-number-w__lessn-name">Поиск авторов и работа с биржами</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Как выбирать авторов и работать с ними: контролировать, проверять статьи, оплачивать работу.</li>
                                    <li>Как искать авторов на биржах и сайтах для фрилансеров.</li>
                                    <li>Обзор популярных бирж, где ищут авторов статей для информационных сайтов.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Зарегистрируетесь на биржах, напишите авторам и закажете им первые статьи для сайта.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="11">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">11</div>
                                <div class="big-number-w__lessn-name">Отсев авторов и проверка текста</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Рекомендации по выбору лучших авторов, с которыми вы будете работать дальше. Общение с авторами и пробные тексты.</li>
                                    <li>Проверка текстов на уникальность, SEO-параметры, орфографию.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Научитесь отсеивать авторов по результатам пробных текстов и проверять написанные ими статьи. Выберете авторов, с которыми можно сотрудничать дальше.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="12">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">12</div>
                                <div class="big-number-w__lessn-name">Настройка темы сайта</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Что такое концепция главной страницы сайта, для чего она нужна и как ее правильно настроить.</li>
                                    <li>Установка WordPress и основные настройки.</li>
                                    <li>Выбор темы оформления сайта.</li>
                                    <li>Как настроить протокол безопасности HTTPS на Wordpress.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Установите на сайт тему «Марафон» — специальная тема для участников Марафона Начало, которая подходит для старта, соответствует требованиям SEO-специфики.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="13">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">13</div>
                                <div class="big-number-w__lessn-name">Панели вебмастера Яндекса, Гугла. Настройка</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Установка robots.txt и Google XML Sitemaps.</li>
                                    <li>Как добавить сайт в сервисы для вебмастера и для чего это нужно.</li>
                                    <li>Какие настройки выставить.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Познакомите сайт с поисковиками и настроите его. Всё готово для публикации ваших первых статей.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="14">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">14</div>
                                <div class="big-number-w__lessn-name">Оформление и публикация статей</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Требования к теме оформления сайта. Установка темы на сайт.</li>
                                    <li>Как публиковать статьи в CMS Wordpress.</li>
                                    <li>Оформление публикаций.</li>
                                    <li>Title, Description, Keywords. Что должно быть в каждой статье, чтобы поисковики полюбили ваш сайт.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Выложите и оформите первые статьи на вашем сайте.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="15">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">15</div>
                                <div class="big-number-w__lessn-name">Перелинковка</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Что такое перелинковка, как настроить эффективную перелинковку.</li>
                                    <li>Как настроить ручную перелинковку.</li>
                                    <li>Плагины и пошаговый план автоматической перелинковки.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Научитесь настраивать перелинковку, полезную для посетителей сайта и прибавляющую вес вашему сайту.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="16">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <div class="big-number-w__big-number">16</div>
                                <div class="big-number-w__lessn-name">Монетизация. Мастер-класс по добавлению в Google Adsense и РСЯ.</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Про что урок</strong>
                                <ul>
                                    <li>Какими способами можно монетизировать сайт. С чего начать на старте?</li>
                                    <li>Как работать с контекстной рекламой Google и Яндекса. Условия для начала работы, ограничения, форматы рекламных блоков, вывод заработанных денег.</li>
                                    <li>Тизерные сети: какие тизерные сети использовать на новом сайте, где размещать, какие цвета использовать.</li>
                                    <li>Дополнительные фишки рекламы.</li>
                                </ul>
                                <strong class="b-item1">Результат</strong>
                                <p>Как только ваш сайт получит первых посетителей, вы разместите на нём рекламные блоки и начнете получать первый доход.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="17">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <!-- <div style="height: 212px;" class="big-number-w__big-number"></div> -->
                                <div class="big-number-w__lessn-name">Мотивационные уроки</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <p>
                                    Участники Золотых Марафонов и Олимпа расскажут о своём опыте в сайтах, дадут советы новичкам, укажут на возможные ошибки в начале пути.
                                </p>
                                <strong class="b-item1">Результат</strong>
                                <p>
                                    Получите заряд мотивации и советы от тех, кто уже добился высокой прибыли в информационных сайтах. Узнаете, на какие “грабли” они наступали и как решали эти проблемы.
                                </p>
                                <p>
                                    Онлайн-встречи с Золотыми Марафонцами — это взгляд на перспективу, то есть вы сможете глобально посмотреть на работу вебмастера и понять, куда двигаться после создания сайта.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="18">
                        <div class="m--table-cell">
                            <div class="big-number-w">
                                <!-- <div style="height: 212px;" class="big-number-w__big-number"></div> -->
                                <div class="big-number-w__lessn-name">Дополнительные уроки</div>
                            </div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <ul>
                                    <li>Сессия ответов на вопросы по подбору вводных слов</li>
                                    <li>Сессия ответов на вопросы по парсингу</li>
                                    <li>Сессия ответов на вопросы по разгруппировке ядра</li>
                                    <li>Обратная связь по составлению ТЗ</li>
                                    <li>Сессия с Романом Пузатом. Ответы на распространенные вопросы</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- // .b__course-structure -->
        <section class="nachalo2-bonuses">
            <h2>Бонусы для участников</h2>
            <div class="nachalo2-bonuses-list">
                <div class="nachalo2-bonuses-list__el">Список выжженных ниш - тематики сайтов, которые новичкам следует избегать.</div>
                <div class="nachalo2-bonuses-list__el">Настроенная тема оформления для вашего сайта на <b>Wordpress</b>. Можно не настраивать вручную.</div>

                <div class="nachalo2-bonuses-list__el">Настройки для <b>Key Collector</b>, чтобы вы сэкономили время при работе с программой.</div>
                <div class="nachalo2-bonuses-list__el">Доступ к сервису <b>TZ.BINET.PRO</b>, который автоматически генерирует технические задания для статей.</div>
                <div class="nachalo2-bonuses-list__el">Доступ к сервису <b>Анализ Конкуренции</b>, чтобы вы знали, какие статьи нужно писать и добавлять на сайт в первую очередь.</div>
            </div>
        </section>
        <section class="b__banner full-h-b" data-scrollax-parent="true">
            <div class="cover m--bg4" data-scrollax="properties: { translateY: '20%' }"></div>
            <div class="b-item1 text centralize">
                <div class="b-item2">
                    Сложное — теперь просто
                </div>
            </div>
        </section>
        <section class="nachalo2-lessonpass hide-block ">
            <h2>Как проходят уроки</h2>
            <div class="nachalo2-lessonpass-list">
                <div class="nachalo2-lessonpass-list__el">
                    <div class="nachalo2-lessonpass-list__img nachalo2-lessonpass-list__img_1"></div>
                    <div class="nachalo2-lessonpass-list__txt">Одни уроки проходят онлайн, другие выдаются в записи в личном кабинете. Онлайн-уроки проходят в вебинарной комнате в режиме реального времени. Во время урока вы можете задавать свои вопросы спикеру. На следующий день запись онлайн-урока выкладываем в личном кабинете.</div>
                </div>
                <div class="nachalo2-lessonpass-list__separator"></div>
                <div class="nachalo2-lessonpass-list__el">
                    <div class="nachalo2-lessonpass-list__img nachalo2-lessonpass-list__img_2"></div>
                    <div class="nachalo2-lessonpass-list__txt">Также вы можете задать вопросы службе поддержки или обсудить их с другими участниками в закрытой группе курса <span class="nachalo2-lessonpass-list__txt-link" href="#">ВКонтакте</span>.</div>
                </div>
                <div class="nachalo2-lessonpass-list__separator"></div>
                <div class="nachalo2-lessonpass-list__el">
                    <div class="nachalo2-lessonpass-list__img nachalo2-lessonpass-list__img_3"></div>
                    <div class="nachalo2-lessonpass-list__txt">По итогам отчётных уроков вы сдаете домашние задания на проверку в личном кабинете. Так вы будете уверены, что делаете все правильно.</div>
                </div>
            </div>

        </section><!-- // .nachalo2-lessonpass -->

        <section class="cabinet-preview-slider m-bx-wrapper hide-block ">

            <h2>Личный кабинет участника</h2>
            <div class="cabinet-preview-slider__inner">
                <div class="cabinet-preview-slider__el">
                    <img class="cabinet-preview-slider__el-img" src="<?php echo get_template_directory_uri(); ?>/pages/nachalo-new/img/img5.jpg">
                    <div class="cabinet-preview-slider__el-txt">
                        На странице мероприятия участники видят прошедшие уроки, сроки сдачи отчётов, шкалу прогресса по курсу.
                    </div>
                </div>
                <div class="cabinet-preview-slider__el">
                    <img class="cabinet-preview-slider__el-img" src="<?php echo get_template_directory_uri(); ?>/pages/nachalo-new/img/img7.jpg">
                    <div class="cabinet-preview-slider__el-txt">
                        Так выглядит страница урока. Здесь ученики пересматривают прошедшие уроки в записи, скачивают материалы и презентации, отчитываются по домашним заданиям.
                    </div>
                </div>
            </div>

        </section><!-- // .cabinet-preview-slider -->

        <section class="b__unique-services">
            <div style="background: #f2f1f0;">
                <h2>Уникальные сервисы</h2>
                <p class="b__subHead">Только для участников</p>
            </div>
            <div id="slider2">
                <div id="slide-wrapper2">
                    <div class="slide m--table" data-target="1">
                        <div class="m--table-cell">
                            <div><img src="<?php echo get_template_directory_uri(); ?>/img/no_sprite/instruments/tz.jpg" /></div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Как написать статью, которая принесет трафик?</strong>
                                <p>Сервис ТЗ автоматически строит технические задания на статьи для ваших авторов. Какой объем текста должен быть, какие ключи и сколько раз их нужно употребить.</p>
                                <strong class="b-item3 m--pb0">Самый желанный сервис, пользуется огромным спросом у учеников с 2013 года.</strong>
                                <?php /* ?>
                                <div class="marafon2-btn-wrapper">
                                    <a href="#prinyat_uchastie" class="marafon2-btn anchor-btn">принять участие</a>
                                </div>
                                <?php */ ?>
                            </div>
                        </div>
                    </div>
                    <div class="slide m--table" data-target="2">
                        <div class="m--table-cell">
                            <div><img src="<?php echo get_template_directory_uri(); ?>/img/no_sprite/instruments/concurent.jpg" /></div>
                        </div>
                        <div class="m--table-cell">
                            <div class="b-slide-content">
                                <strong class="b-item1">Какие статьи выписывать сейчас, а какие — потом и зачем?</strong>
                                <p>Пишите сначала те статьи, которые быстрее принесут вам трафик. Это позволит вам сэкономить деньги и быстрее зарекомендовать себя в поисковиках. А потом можно выписывать и более конкурентные.</p>
                                <strong class="b-item3 m--pb0">Экономия времени, денег и эффективный старт нового сайта.</strong>
                                <?php /* ?>
                                <div class="marafon2-btn-wrapper">
                                    <a href="#prinyat_uchastie" class="marafon2-btn anchor-btn">принять участие</a>
                                </div>
                                <?php */ ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="b__banner full-h-b" data-scrollax-parent="true">
            <div class="cover m--bg5" data-scrollax="properties: { translateY: '20%' }"></div>
            <div class="b-item1 text centralize">
                <div class="b-item2">
                    ПОШАГОВАЯ ПРОГРАММА, ДОМАШНИЕ ЗАДАНИЯ,
                    <br> ОФИЦИАЛЬНАЯ ПОДДЕРЖКА И ОСОБАЯ ДРУЖЕСКАЯ АТМОСФЕРА
                </div>
            </div>
        </section>
        <section class="b__leading">
            <section class="nachalo2-leaders">
                <h2>Ведущие</h2>
                <div class="m-bx-wrapper">
                    <div class="nachalo2-leaders-inner">
                        <div class="nachalo2-leaders__el">

                            <div class="nachalo2-leaders__el-photo nachalo2-leaders__el-photo_1"></div>
                            <div class="nachalo2-leaders__el-name">Роман <br>Ширяев</div>
                            <div class="nachalo2-leaders-list">
                                <div class="nachalo2-leaders-list__el">Интернет-предприниматель с 8 летним стажем.</div>
                                <div class="nachalo2-leaders-list__el">Владелец более 200 инфосайтов.</div>
                                <div class="nachalo2-leaders-list__el">Владелец компании Binet.pro со штатом 50 человек.</div>
                                <div class="nachalo2-leaders-list__el">Организатор конференций Кинза 2014, 2015, 2016, 2018.</div>
                            </div>

                        </div>
                        <div class="nachalo2-leaders__el">

                            <div class="nachalo2-leaders__el-photo nachalo2-leaders__el-photo_2"></div>
                            <div class="nachalo2-leaders__el-name">Сергей <br> Алейников</div>
                            <div class="nachalo2-leaders-list">
                                <div class="nachalo2-leaders-list__el">Веб-разработчик с 2006 года.</div>
                                <div class="nachalo2-leaders-list__el">Работает с WordPress более 12 лет.</div>
                            </div>

                        </div>
                        <div class="nachalo2-leaders__el">

                            <div class="nachalo2-leaders__el-photo nachalo2-leaders__el-photo_3"></div>
                            <div class="nachalo2-leaders__el-name">Вадим <br>Захаров</div>
                            <div class="nachalo2-leaders-list">
                                <div class="nachalo2-leaders-list__el">Более 7 лет профессионально занимается продвижением сайтов.</div>
                                <div class="nachalo2-leaders-list__el">Специалист по семантическим ядрам.</div>
                                <div class="nachalo2-leaders-list__el">Владелец компаний "Семантика Онлайн" и "Захаров Групп".</div>
                            </div>

                        </div>
                        <div class="nachalo2-leaders__el">

                            <div class="nachalo2-leaders__el-photo nachalo2-leaders__el-photo_4"></div>
                            <div class="nachalo2-leaders__el-name">Ольга <br> Любимцева</div>
                            <div class="nachalo2-leaders-list">
                                <div class="nachalo2-leaders-list__el">Создает сайты с 2009 года, до этого больше 10 лет в СМИ.</div>
                                <div class="nachalo2-leaders-list__el">Работает без офиса с командой в 200 человек.</div>
                                <div class="nachalo2-leaders-list__el">На Марафоне Начало ведет уроки по созданию правильных технических заданий и работе с авторами.</div>
                            </div>

                        </div>
                    </div>
                </div>
            </section> <!-- // .nachalo-leaders -->

            <div class="b-course-format nachalo2-course-format b-container">
                <h2>Формат курса</h2>
                <div class="m--table">
                    <div class="m--table-cell">
                        <div class="b-cf-item">
                            <strong>Только практика.</strong> После уроков повторяйте материал на практике.
                        </div>
                    </div>
                    <div class="m--table-cell">
                        <div class="b-cf-item">
                            <strong> Уроки делятся на блоки.</strong> На каждом из блоков необходимо выполнить отчетное задание. После выполнения отчетного задания для ученика открывается следующий блок.
                        </div>
                    </div>
                    <div class="m--table-cell">
                        <div class="b-cf-item">
                            <strong>Уроки и материалы в личном кабинете.</strong>Все уроки и материалы навсегда сохраняются в вашем личном кабинете. Вы можете в любой момент их пересмотреть.
                        </div>
                    </div>
                </div>
                <div class="m--table">
                    <div class="m--table-cell">
                        <div class="b-cf-item">
                            <strong>Поддержка.</strong> Ответы на вопросы по курсу и марафонским сайтам во время Марафона.
                        </div>
                    </div>
                    <div class="m--table-cell">
                        <div class="b-cf-item">
                            <strong>Много примеров и наглядности.</strong> Смотрите и повторяйте за спикером.
                        </div>
                    </div>
                     <div class="m--table-cell">
                        <div class="b-cf-item">
                            <strong> Ответы от спикеров.</strong> Спикеры отвечают на вопросы участников на онлайн-сессиях.
                        </div>
                    </div>
                </div>
                <div class="m--table">
                    <div class="m--table-cell hide-block">
                        <div class="b-cf-item">
                            <strong>Номинации и призы</strong> Награждаем лучших марафонцев ценными призами и дарим фирменную продукцию Пузат.ру.
                        </div>
                    </div>
                    <div class="m--table-cell">
                        <div class="b-cf-item">
                            <strong><?= $dateShow ?></strong> Старт и первый урок.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="b__requirements">
            <h2 class="m--colorFFF">Что нужно для прохождения?</h2>
            <div class="m--table b-requirements-block">
                <div class="m--table-cell">
                    <div class="b-requirements-item">
                        <div class="b-requirements-img1"></div>
                        <strong>Вложения в сайт</strong>
                        <p>Во время марафона
                            <br> 1 000 - 7 000 руб.</p>
                    </div>
                </div>
                <div class="m--table-cell">
                    <div class="b-requirements-item">
                        <div class="b-requirements-img2"></div>
                        <strong>Желание</strong>
                        <p>Отсутствие лени,
                            <br> нацеленность на результат.</p>
                    </div>
                </div>
                <div class="m--table-cell">
                    <div class="b-requirements-item">
                        <div class="b-requirements-img3"></div>
                        <strong>Свободное время</strong>
                        <p>Минимум 2 часа в день.</p>
                    </div>
                </div>
            </div>
            <div class="b-start-button-container m--taCenter">
            <?php /* ?>
                <a href="#prinyat_uchastie" class="anchor-btn m--white">принять участие</a>
            <?php */ ?>
            </div>
        </section>
        <section class="b__way-of-development marafon2-wod">
            <h2>Путь развития <br> в информационных сайтах </h2>
            <p class="b__subHead">Это лишь начало пути</p>
            <div class="b-container">
                <div class="b-wod-block m--table">
                    <div class="m--table-cell">
                        <div class="b-wod-wrapp">
                            <div class="b-wod-img1"></div>
                        </div>
                        <strong>начало</strong>
                    </div>
                    <div class="m--table-cell">
                        <div class="b-wod-wrapp">
                            <div class="b-wod-evol-img3"></div>
                        </div>
                        <strong>спарта</strong>
                    </div>
                    <div class="m--table-cell">
                        <div class="b-wod-wrapp">
                            <div class="b-wod-evol-img4"></div>
                        </div>
                        <strong>арена</strong>
                    </div>
                    <div class="m--table-cell">
                        <div class="b-wod-wrapp">
                            <div class="b-wod-evol-img5"></div>
                        </div>
                        <strong>олимп</strong>
                    </div>
                </div>
            </div>
        </section>

        <div class="video-review">
            <h2>Видеоотзывы учеников о курсе</h2>
            <div class="b-container">
                <div class="video-review__wrapper">
                    <div class="video-review__inner video-review__slider">
                        <div class="video-review__el video-review__slider-el" id="ET__review">
                            <div class="video-review__thumb">
                                <div class="video-review__play-btn landing-video-popup" href="https://youtu.be/da2ZWvwJ1v8"></div>
                                <!-- <a class="b-video-play landing-video-popup" href="https://youtu.be/mOyRvix1tlg"></a> -->
                            </div>
                            <div class="video-review__el-desc">
                                <div class="video-review__el-title">Евгений Томилин</div>
                                <div class="video-review__el-info">г. Киев</div>
                            </div>
                        </div>
                        <div class="video-review__el video-review__slider-el" id="IP__review">
                            <div class="video-review__thumb">
                                <div class="video-review__play-btn landing-video-popup" href="https://youtu.be/Kz_HtjGBbgs"></div>
                            </div>
                            <div class="video-review__el-desc">
                                <div class="video-review__el-title">Ирина Поспелова</div>
                                <div class="video-review__el-info">г. Пермь</div>
                            </div>
                        </div>
                        <div class="video-review__el video-review__slider-el" id="IM__review">
                            <div class="video-review__thumb">
                                <div class="video-review__play-btn landing-video-popup" href="https://youtu.be/4ectHtnoGEw"></div>
                            </div>
                            <div class="video-review__el-desc">
                                <div class="video-review__el-title">Иван Мельник</div>
                                <div class="video-review__el-info">г. Шпичинцы</div>
                            </div>
                        </div>
                        <div class="video-review__el video-review__slider-el" id="MK__review">
                            <div class="video-review__thumb">
                                <div class="video-review__play-btn landing-video-popup" href="https://youtu.be/iY6NhOVePiY"></div>
                            </div>
                            <div class="video-review__el-desc">
                                <div class="video-review__el-title">Максим Козлов</div>
                                <div class="video-review__el-info">г. Винница</div>
                            </div>
                        </div>
                        <div class="video-review__el video-review__slider-el" id="MV__review">
                            <div class="video-review__thumb">
                                <div class="video-review__play-btn landing-video-popup" href="https://youtu.be/4QaWAdTuWUU"></div>
                            </div>
                            <div class="video-review__el-desc">
                                <div class="video-review__el-title">Михаил Ванюшин</div>
                                <div class="video-review__el-info">г. Казань</div>
                            </div>
                        </div>
                        <div class="video-review__el video-review__slider-el" id="OR__review">
                            <div class="video-review__thumb">
                                <div class="video-review__play-btn landing-video-popup" href="https://youtu.be/IieW-McUUog"></div>
                            </div>
                            <div class="video-review__el-desc">
                                <div class="video-review__el-title">Олег Рогович</div>
                                <div class="video-review__el-info">г. Санкт-Петербург</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- video-review -->

        <div class="studentsResults2" id="studentsResults2" data-url="<?= get_template_directory_uri(); ?>">
            <h2>Результаты учеников <br>марафона начало</h2>
            <div class="studentsResults2__inner">
                <div class="studentsResults2__element" v-for="item in items" >
                    <a :href="item.student.link" target="_blank" class="studentsResults2__element-link">
                        <span class="studentsResults2__element-button">Смотреть</span>
                        <img class="studentsResults2__element-preview" :src="item.student.preview" width="285" height="285">
                    </a>
                    <div class="studentsResults2__element-title">{{ item.student.name }}, {{ item.student.city }}</div>
                    <div class="studentsResults2__element-event hide-block">{{ item.student.event }}</div>
                    <div class="studentsResults2__element-description">{{ item.student.result }}</div>
                </div>
            </div>
        </div>

        <?php
        /**
         * Пока закомментировал, возможно понадобится снова,
         * поэтому не выпиливаю полностью.
         */
        /*
        <section class="students-results">

            <h2 class="m--colorFFF">Результаты учеников<br> марафона начало</h2>
            <div class="m-bx-wrapper m-bx-wrapper_type2">

                <div class="students-results-inner">

                    <div class="students-results__el">

                        <div class="students-results__el-preview">
                            <img class="students-results__el-preview-img" src="<?php echo get_template_directory_uri(); ?>/img/no_sprite/cases-preview/olga_lyubimceva.jpg">
                            <a class="b-vs-play landing-video-popup" href="https://www.youtube.com/watch?v=STD9LgaMw30">
                            <span></span>
                            </a>
                        </div>
                        <div class="students-results__el-info">
                            <div class="students-results__el-title">
                                Ольга Любимцева
                            </div>
                            <div class="students-results__el-progress">
                                С 7 000 до 200 000 руб/мес
                            </div>
                            <div class="students-results__el-description">
                                Работала ведущей на радио, потом делала сайты сама, но заработок был скромный. В 2013 году прошла первый Марафон и сделала сайт с нуля, который через 8 мес. приносил 30 000 руб.
                            </div>
                        </div>

                    </div><!-- // .students-results__el -->

                    <div class="students-results__el">
                        <div class="students-results__el-preview">
                            <img class="students-results__el-preview-img" src="<?php echo get_template_directory_uri(); ?>/pages/nachalo-new/img/dmitriyk.jpg">
                            <a class="b-vs-play landing-video-popup" href="https://www.youtube.com/watch?v=XmEuI9xqSx0">
                            <span></span>
                            </a>
                        </div>
                        <div class="students-results__el-info">
                            <div class="students-results__el-title">
                                Дмитрий Кривошеев
                            </div>
                            <div class="students-results__el-progress">
                                С 4 000 до 200 000 руб/мес
                            </div>
                            <div class="students-results__el-description">
                                Работал инструктором в фитнес-клубе. Увидел кейс марафонца о продаже сайта за 600 000 руб. и записался на Марафон. В декабре 2015 года ушёл с работы и начал заниматься только сайтами, доход к тому времени был уже 80 000 рублей.
                            </div>
                        </div>
                    </div><!-- // .students-results__el -->

                    <div class="students-results__el">
                        <div class="students-results__el-preview">
                            <img class="students-results__el-preview-img" src="<?php echo get_template_directory_uri(); ?>/pages/nachalo-new/img/shaposhnikov.jpg">
                            <a class="b-vs-play landing-video-popup" href="https://youtu.be/ajR3CwZVkzc">
                            <span></span>
                            </a>
                        </div>
                        <div class="students-results__el-info">
                            <div class="students-results__el-title">
                                Евгений Шапошников
                            </div>
                            <div class="students-results__el-progress">
                                С 0 до 65 000 руб/мес
                            </div>
                            <div class="students-results__el-description">
                                Пришел на Марафон студентом. Вывел марафонский сайт на доход 45 000 рублей в месяц. И продолжил создавать новые сайты.
                            </div>
                        </div>
                    </div><!-- // .students-results__el -->

                    <div class="students-results__el">
                        <div class="students-results__el-preview">
                            <img class="students-results__el-preview-img" src="<?php echo get_template_directory_uri(); ?>/img/no_sprite/cases-preview/anton_kozlov.jpg">
                            <a class="b-vs-play landing-video-popup" href="https://www.youtube.com/watch?v=gqiEvgOtMoo">
                            <span></span>
                            </a>
                        </div>
                        <div class="students-results__el-info">
                            <div class="students-results__el-title">
                                Антон Козлов
                            </div>
                            <div class="students-results__el-progress">
                                С 0 до 150 000 руб/мес.
                            </div>
                            <div class="students-results__el-description">
                                До сайтов работал на железной дороге холодильщиком и делал сайты в свободное время. Уволился с ж/д, когда доход от проектов стал превышать зарплату в несколько раз.
                            </div>
                        </div>
                    </div><!-- // .students-results__el -->

                    <div class="students-results__el">
                        <div class="students-results__el-preview">
                            <img class="students-results__el-preview-img" src="<?php echo get_template_directory_uri(); ?>/img/no_sprite/cases-preview/oleg_xalin.jpg">
                            <a class="b-vs-play landing-video-popup" href="https://www.youtube.com/watch?v=ONaNFL3oR2Q">
                            <span></span>
                            </a>
                        </div>
                        <div class="students-results__el-info">
                            <div class="students-results__el-title">
                                Олег Халин
                            </div>
                            <div class="students-results__el-progress">
                                С 30 000 до 70 000 руб/мес.
                            </div>
                            <div class="students-results__el-description">
                                Работал веб-дизайнером в студии, но понял, что создавать и продвигать информационные сайты выгоднее. Сейчас делает сайты вместе с женой. А самый первый марафонский сайт продал за 1 600 000 руб.
                            </div>
                        </div>
                    </div><!-- // .students-results__el -->

                    <div class="students-results__el">
                        <div class="students-results__el-preview">
                            <img class="students-results__el-preview-img" src="<?php echo get_template_directory_uri(); ?>/img/no_sprite/cases-preview/viktor_pop.jpg">
                            <a class="b-vs-play landing-video-popup" href="https://www.youtube.com/watch?v=IBtC__I6c68">
                            <span></span>
                            </a>
                        </div>
                        <div class="students-results__el-info">
                            <div class="students-results__el-title">
                                Виктор Поп
                            </div>
                            <div class="students-results__el-progress">
                                С 0 до 50 000 руб/мес.
                            </div>
                            <div class="students-results__el-description">
                                Начал делать сайты еще студентом. Случайно наткнулся на блог Пузат.ру, и через год после участия в курсе вышел на доход с сайтов в $1000. Сейчас создает, развивает и продает сайты. Один из сайтов продал за 1 400 000 руб.
                            </div>
                        </div>
                    </div><!-- // .students-results__el -->

                </div><!-- // .students-results-inner -->

            </div><!-- // .m-bx-wrapper -->

        </section><!-- // .students-results -->

        */ ?>

        <section class="students-sites">

            <h2 class="m--colorFFF">Сайты наших учеников</h2>

            <div class="students-sites-element">
                <div class="students-sites-element__preview-img">
                    <img src="/wp-content/themes/puzatru/img/students-sites-element__img3.jpg" alt="" class="students-sites-element__img">
                    <a href="#" class="students-sites-element__link students-sites-element__flx" data-imgsrc="/wp-content/themes/puzatru/img/students-sites-element__img3_not-preview.jpg" data-pricesrc="35 318">
                        <span class="students-sites-element__link-button">Смотреть</span>
                    </a>
                </div>
                <div class="students-sites-element__info-row"><span class="students-sites-element__info-row-b">Ниша</span> Дети</div>
                <div class="students-sites-element__info-row"><span class="students-sites-element__info-row-b">Доход</span> 35 318 руб./мес.</div>
            </div><!-- // .students-sites-element -->

            <div class="students-sites-element">
                <div class="students-sites-element__preview-img">
                    <img src="/wp-content/themes/puzatru/img/students-sites-element__img1.jpg" alt="" class="students-sites-element__img">
                    <a href="#" class="students-sites-element__link students-sites-element__flx" data-imgsrc="/wp-content/themes/puzatru/img/students-sites-element__img1_not-preview.jpg" data-pricesrc="44 000">
                        <span class="students-sites-element__link-button">Смотреть</span>
                    </a>
                </div>
                <div class="students-sites-element__info-row"><span class="students-sites-element__info-row-b">Ниша</span> Бытовая техника</div>
                <div class="students-sites-element__info-row"><span class="students-sites-element__info-row-b">Доход</span> 44 000 руб./мес.</div>
            </div><!-- // .students-sites-element -->

            <div class="students-sites-element">
                <div class="students-sites-element__preview-img">
                    <img src="/wp-content/themes/puzatru/img/students-sites-element__img5.jpg" alt="" class="students-sites-element__img">
                    <a href="#" class="students-sites-element__link students-sites-element__flx" data-imgsrc="/wp-content/themes/puzatru/img/students-sites-element__img5_not-preview.jpg" data-pricesrc="100 000">
                        <span class="students-sites-element__link-button">Смотреть</span>
                    </a>
                </div>
                <div class="students-sites-element__info-row"><span class="students-sites-element__info-row-b">Ниша</span> Красота и здоровье</div>
                <div class="students-sites-element__info-row"><span class="students-sites-element__info-row-b">Доход</span> 100 000 руб./мес.</div>
            </div><!-- // .students-sites-element -->

            <div class="students-sites-element">
                <div class="students-sites-element__preview-img">
                    <img src="/wp-content/themes/puzatru/img/students-sites-element__img6.jpg" alt="" class="students-sites-element__img">
                    <a href="#" class="students-sites-element__link students-sites-element__flx" data-imgsrc="/wp-content/themes/puzatru/img/students-sites-element__img6_not-preview.jpg" data-pricesrc="20 000">
                        <span class="students-sites-element__link-button">Смотреть</span>
                    </a>
                </div>
                <div class="students-sites-element__info-row"><span class="students-sites-element__info-row-b">Ниша</span> Медицина</div>
                <div class="students-sites-element__info-row"><span class="students-sites-element__info-row-b">Доход</span> 20 000 руб./мес.</div>
            </div><!-- // .students-sites-element -->

        </section><!-- // .students-sites -->

        <section class="b__questions marafon2-questions">
            <h2>часто задаваемые вопросы</h2>

            <div class="b-container">
                <div id="accordion">
                    <h3>Может, нужно какое-то специальное оборудование для участия в Марафоне или специальные программы?</h3>
                    <div>Всё, что вам понадобится, — компьютер с быстрым доступом в интернет. В процессе обучения мы расскажем, какие программы понадобятся и дадим доступ к онлайн-сервисам, поэтому заранее ничего устанавливать не нужно.</div>
                    <h3>Состоится ли Марафон Начало в следующем году?</h3>
                    <div>Да, обязательно состоится. Но если вы решили зарабатывать на информационных сайтах, не стоит терять еще полгода. Чем быстрее вы разберетесь в теме и начнете делать сайт, тем скорее получите первые деньги.</div>
                    <h3>Где можно узнать конкретное расписание занятий и о прочих организационных вещах подробнее?</h3>
                    <div>Всю информационную рассылку получают только участники Марафона Начало за 2-5 дней до начала самого курса.</div>
                    <h3>Сколько необходимо денег на начальном этапе?</h3>
                    <div>На начальном этапе нужно как минимум 1500-2000 рублей - это расходы на самые элементарные вещи: хостинг, домен, прокси и т.п. Рекомендуемые вложения - около 10 000 рублей. Но больше - лучше. Главное - вкладывать в развитие своего сайта целесообразно и разумно, не слишком мало, но и не бездумно много.</div>
                </div>
            </div>
        </section>
        <section class="b__summary marafon2-summary">
            <h2>Подведем итог. Что такое начало?</h2>
            <div class="b-list-container">
                <div class="b-list">
                    <ul>
                        <li><span>1.</span>НОВЫЙ МОДУЛЬ «Инвестиции в сайты. Старт через покупку»</li>
                        <li><span>2.</span>Онлайн-сессии ответов на вопросы.</li>
                        <li><span>3.</span>Новая профессия - вебмастер, практика по работе с исполнителями.</li>
                        <li><span>4.</span>Одобренная Романом Пузатом ниша.</li>
                        <li><span>5.</span>Промокоды на скидки и бонусы в сервисах, которые мы рекомендуем использовать участникам.</li>
                        <li><span>6.</span>Официальная поддержка вне уроков по почте.</li>
                        <li><span>7.</span>Сервис tz.binet.pro: автоматическое формирование ТЗ на статьи.</li>
                        <li><span>8.</span>Сервис Конкуренции: какие статьи писать в первую очередь для получения максимальных результатов</li>
                        <li><span>9.</span>Специальная и настроенная сборка Wordpress для Марафонцев.</li>
                        <li><span>10.</span>Сайт, готовый к дальнейшему развитию по доходу и трафику.</li>
                        <li><span>11.</span>Как минимум 10 опубликованных статей только за время курса.</li>
                        <li><span>12.</span>Первые посетители на вашем сайте.</li>
                        <li><span>13.</span>16 основных уроков.</li>
                    </ul>
                </div>
                <div class="b-list-arr x-open-block"></div>
            </div>
        </section>
        <section class="b__banner full-h-b" data-scrollax-parent="true">
            <div class="cover m--bg7" data-scrollax="properties: { translateY: '20%' }"></div>
            <div class="b-item1 text centralize">
                <div class="b-item2">
                    ВЫ СОЗДАДИТЕ ИНФОРМАЦИОННЫЙ САЙТ, КОТОРЫЙ БУДЕТ <br>ПРИНОСИТЬ ВАМ  ОТ 10 000 РУБ. В МЕСЯЦ ЧЕРЕЗ 4-12 МЕСЯЦЕВ
                </div>
            </div>
        </section>

        <div id="main_form">
            <!-- Доп. стили для псевдоэлементов чекбоксов -->
            <style>
                .standart_form_wrapper input[type="checkbox"]:checked + label::before,
                .standart_form_wrapper input[type="radio"]:checked + label::before { border: 2px solid #00a4db; }
                .standart_form_wrapper input[type="checkbox"]:checked + label::after,
                .standart_form_wrapper input[type="radio"]:checked + label::after { background: #00a4db; width: 8px; height: 8px; left: 7px; margin-top: -4px; }

                        .promocode-error {
                                display: inline-block;
                                width: 100%;
                        }
            </style>
            <div class="s_form_border">
                            <div class=" marafon2-form marafon2-form_sparta-form m--form defaultForm" id="prinyat_uchastie">
        <div class="defaultForm__wrapper" data-id="48">

                    <div class="defaultForm-leftBlock">

                                    <div id="formLeftInfo">
                                                    <div class="defaultForm__step-title formStepOne" id="formStepOne"><div class="defaultForm__step-title_bold">Регистрация на мероприятие.</div> </div>
                                                    <div class="defaultForm-courseBonuses">
                                                                                        <div class="defaultForm-courseBonuses__title">Регистрируйтесь сейчас и получите:</div>
                                <div class="defaultForm-courseBonuses-list">
                                    <div class="defaultForm-courseBonuses-list__element">Вводный урок марафона Начало 2.0</div>
                                </div>
                                                    </div>
                                                    <div class="defaultForm-detailInfo">
                                                                    <div class="defaultForm-detailInfo__startDate">
                                            Дата старта <span class="defaultForm-detailInfo__red"><?= $dateShow ?></span>
                                        </div>
                                                                                                                    </div>
                                            </div>

                </div>
                <div class="defaultForm-rightBlock">
                <script src="https://www.google.com/recaptcha/api.js"></script>
                <script>
                  $( document ).ready(function(){
                   // $( "#ltForm3998955 button" ).click(function(){ 
                    $('#ltForm3998955').submit(function(){
                         
                        var response = grecaptcha.getResponse();
                        if(response.length == 0) {
                            alert('Вы не прошли проверку CAPTCHA должным образом');
                            return false;
                        }
                    });
                });
                </script>
               <form  class="defaultForm-form courseRegForm" id="ltForm3998955"  action="https://online.puzat.ru/pl/lite/block-public/process-html?id=213740013" method="post" data-open-new-window="0"><input type="hidden" name="formParams[setted_offer_id]" ><br>
                
                    <div class="form_row mail_row defaultForm__input-wrapper">
                        <input type="text" maxlength="60" required placeholder="Введите ваш эл. адрес" name="formParams[email]" value="" class="defaultForm__input">
                    </div><br/>
                    <div class="form_row uname_row defaultForm__input-wrapper">
                        <input type="text" maxlength="60"   placeholder="Введите ваше имя" name="formParams[full_name]" value="" class="defaultForm__input">
                    </div><br/>
                    <div class="form_row phone_row defaultForm__input-wrapper">
                        <input type="text" maxlength="60" required  placeholder="Введите ваш телефон" name="formParams[phone]" value="" class="event_phone defaultForm__input">
                    </div><br/>
                    <div class="g-recaptcha" data-sitekey="6Lcm9XIfAAAAAJdl4_RyCMBfA7BCLt1US2lwoenG"></div>
                    <br>
                    <button type="submit"
                            id="button3583880"
                            class="defaultForm__btn"
                            onclick="ym(30253294, 'reachGoal', 'nachalorequest');" 
                            style="color: ; background-color: ; " onclick="if(window['btnprs5e39164d434d4']){return false;}window['btnprs5e39164d434d4']=true;setTimeout(function(){window['btnprs5e39164d434d4']=false},6000);return true;">Купить курс</button><br>
                     <div class="checkbox-promo-w" id="nachalo_check" style="display: block;">
                        <div class="checkbox_w">
                            <div class="checkbox_w-error" style="color: red; font-size: 14px; line-height: 18px; padding: 0px 0px 15px; display: none;">
                                Вы не&nbsp;можете продолжить без&nbsp;согласия с&nbsp;политикой конфиденциальности.
                            </div>
                            <input type="checkbox" id="check_box_form" checked="" onclick="if($(this).is(':checked')){ $('#button2722687').removeAttr('disabled');$(this).parents('.checkbox_w').find('.checkbox_w-error').slideUp(100); } else { $('#button2722687').attr('disabled','disabled');$(this).parents('.checkbox_w').find('.checkbox_w-error').slideDown(100); }">
                            <label for="check_box_form">
                                <div class="defaultForm__privacy">Я согласен с <a href="https://puzat.ru/privacy" target="_blank">Политикой конфиденциальности</a> <br>и <a href="https://puzat.ru/document" target="_blank">договором-офертой</a>
                                </div>
                            </label>
                        </div>
                    </div>   
                    <input type="hidden" id="891755e39164d36b7c" name="__gc__internal__form__helper" class="__gc__internal__form__helper" value="">
                    <input type="hidden" id="891755e39164d36b7cref" name="__gc__internal__form__helper_ref" class="__gc__internal__form__helper_ref" value="">
                    <input type="hidden" name="requestTime" value="1580799565">
                    <input type="hidden" name="requestSimpleSign" value="b76669d61f36da7dd4eb79604dae687a">
                    <input type="hidden" name="isHtmlWidget" value="1"/></form><span id="gccounterImgContainer"></span><script>
                        window.onload = function(){
                            let loc = document.getElementById("891755e39164d36b7c");
                            loc.value = window.location.href;
                            let ref = document.getElementById("891755e39164d36b7cref");
                            ref.value = document.referrer;
                        }
                    </script>
                    <script async defer>
                        window.onload = function(){
                            let statUrl = "https://online.puzat.ru/stat/counter?ref=" + encodeURIComponent(document.referrer)
                                + "&loc=" + encodeURIComponent(document.location.href);
                            document.getElementById('gccounterImgContainer').innerHTML
                                = "<img width=1 height=1 style='display:none' id='gccounterImg' src='" + statUrl + "'/>";
                        }
                    </script>


                  <!--  <form id="ltForm5986240" class="defaultForm-form courseRegForm" method="post" data-open-new-window="0" onsubmit="return checkFormGC(this);">
                    <input type="hidden" name="formParams[setted_offer_id]" >
                    <div class="form_row mail_row defaultForm__input-wrapper">
                        <input type="text" maxlength="60"  placeholder="Введите ваш эл. адрес" name="formParams[email]" value="" class="defaultForm__input">
                    </div><br/>
                    <div class="form_row uname_row defaultForm__input-wrapper">
                        <input type="text" maxlength="60"  placeholder="Введите ваше имя" name="formParams[full_name]" value="" class="defaultForm__input">
                    </div><br/>
                    <div class="form_row phone_row defaultForm__input-wrapper">
                        <input type="text" maxlength="60"  placeholder="Введите ваш телефон" name="formParams[phone]" value="" class="event_phone defaultForm__input"><br>
                    </div><br/>

                    <input type="submit" id="button9954792" onclick="if(window['btnprs5d26e1cb27662']){return false;}window['btnprs5d26e1cb27662']=true;setTimeout(function(){window['btnprs5d26e1cb27662']=false},6000);return true;" class="defaultForm__btn" value="Записаться" >

                    <div class="checkbox-promo-w" id="nachalo_check" style="display: block;">
                        <div class="checkbox_w">
                            <div class="checkbox_w-error" style="color: red; font-size: 14px; line-height: 18px; padding: 0px 0px 15px; display: none;">
                                Вы не&nbsp;можете продолжить без&nbsp;согласия с&nbsp;политикой конфиденциальности.
                            </div>
                            <input type="checkbox" id="check_box_form" checked="" onclick="if($(this).is(':checked')){ $('#button2722687').removeAttr('disabled');$(this).parents('.checkbox_w').find('.checkbox_w-error').slideUp(100); } else { $('#button2722687').attr('disabled','disabled');$(this).parents('.checkbox_w').find('.checkbox_w-error').slideDown(100); }">
                            <label for="check_box_form">
                                <div class="defaultForm__privacy">Я согласен с <a href="https://puzat.ru/privacy" target="_blank">Политикой конфиденциальности</a> <br>и <a href="https://puzat.ru/document" target="_blank">договором-офертой</a>
                                </div>
                            </label>
                        </div>
                    </div>

                    <input type="hidden" name="__gc__internal__form__helper" class="__gc__internal__form__helper" value="">
                    <input type="hidden" name="requestTime" value="1562829259">
                    <input type="hidden" name="requestSimpleSign" value="6ef42bfbee73e39e436772b051d507bd">
                    <input type="hidden" name="isHtmlWidget" value="1"/>
                    </form><script>window.onload=function(){document.getElementsByClassName("__gc__internal__form__helper")[0].value = window.location.href;}</script>
                    <script>
                        $('#ltForm5986240').prop('action', 'https://online.puzat.ru/pl/lite/block-public/process-html?id=213740013');
                    </script>
                -->
                </div>
            <div class="clear"></div>
        </div>

        </div>                <div class="clear"></div>
            </div>
        </div>

        <?php
        /**
         * Пока закомментировал, возможно понадобится снова,
         * поэтому не выпиливаю полностью.
         */
        /*
        <div class="b-comments-vkpost">

            <div class="b-comments-vkpost__inner">
                <div class="b-comments-vkpost__main-title">отзывы учеников в VK.com</div>
                <div class="comments-vkpost-list">
                    <div class="comments-vkpost-list__el">

                         <a target="_blank" class="comments-vkpost-list__el-link"
                         href="https://vk.com/puzatru?w=wall-25560260_24197">
                             <div class="comments-vkpost-list__el-thumb">
                                 <img src="https://pp.userapi.com/c638428/v638428536/39345/0dCcTDNhO78.jpg" alt="">
                             </div>
                             <div class="comments-vkpost-list__el-right">
                                 <div class="comments-vkpost-list__el-name">
                                     Юлия Пахучая
                                 </div>
                                 <div class="comments-vkpost-list__el-comment">
                                     Огромное спасибо команде Пузат, за супер Марафон, за то что "подсадили")) на первую ступеньку)), впереди интереснейший путь, который мне очень нравится! Спасибо Роману за нишу, оооо-чень мне близка и знакома изнутри!!! Спасибо всем отзывчивым ребятам из нашего потока за помощь и поддержку! И не прощаемся!
                                 </div>
                                 <div class="comments-vkpost-list__el-date">
                                     25 мая в 10:04
                                 </div>
                             </div>
                         </a>
                    </div>
                    <div class="comments-vkpost-list__el">

                         <a target="_blank" class="comments-vkpost-list__el-link"
                         href="https://vk.com/puzatru?w=wall-25560260_24180">
                             <div class="comments-vkpost-list__el-thumb">
                                 <img src="https://pp.userapi.com/c837126/v837126994/58332/CaPAWKCSElU.jpg" alt="">
                             </div>
                             <div class="comments-vkpost-list__el-right">
                                 <div class="comments-vkpost-list__el-name">
                                     Іван Мельник
                                 </div>
                                 <div class="comments-vkpost-list__el-comment">
                                     Очень положительный урок, отличный заряд мотивации! Спасибо вам, Роман, вы умеете подбодрить, мотивировать, дать уверенность, что мы двигаемся в правильном направлении. Жду Спарты, а там и Олимп недалеко!
                                 </div>
                                 <div class="comments-vkpost-list__el-date">
                                     24 мая в 21:57
                                 </div>
                             </div>
                         </a>
                    </div>
                    <div class="comments-vkpost-list__el">

                         <a target="_blank" class="comments-vkpost-list__el-link"
                         href="https://vk.com/puzatru?w=wall-25560260_24184">
                             <div class="comments-vkpost-list__el-thumb">
                                 <img src="https://pp.userapi.com/c636826/v636826026/46cb8/b_u_AWM8CSE.jpg" alt="">
                             </div>
                             <div class="comments-vkpost-list__el-right">
                                 <div class="comments-vkpost-list__el-name">
                                     Сева Лесник
                                 </div>
                                 <div class="comments-vkpost-list__el-comment">
                                     Роман, спасибо спасибо и еще раз спасибо. Да, завершение было мощным. Мне не жаль что все закончилось, ибо я пойду на Спарту и там продолжу путь.
                                 </div>
                                 <div class="comments-vkpost-list__el-date">
                                     24 мая в 22:00
                                 </div>
                             </div>
                         </a>
                    </div>
                    <div class="comments-vkpost-list__el">
                         <a target="_blank" class="comments-vkpost-list__el-link" href="https://vk.com/puzatru?w=wall-25560260_16554">
                             <div class="comments-vkpost-list__el-thumb">
                                 <img src="https://pp.vk.me/c9972/u17084856/d_624f3ec7.jpg" alt="">
                             </div>
                             <div class="comments-vkpost-list__el-right">
                                 <div class="comments-vkpost-list__el-name">
                                     Юра Крестьянников
                                 </div>
                                 <div class="comments-vkpost-list__el-comment">
                                     Один из самых коротких и приятных уроков. Очень жалко, что марафон подошел к концу. Роман отличный спикер, ОЧЕНЬ сильно порадовал бонус в 3 урока, где разберут ошибки, это заставляет стараться даже после марафона. Команда Пузат ру молодцы. Так же очень хочется, чтобы Роман почаще к нам в группу заглядывал:)
                                 </div>
                                 <div class="comments-vkpost-list__el-date">
                                     7 ноя в 22:07
                                 </div>
                             </div>
                         </a>
                    </div>
                    <div class="comments-vkpost-list__el">
                         <a target="_blank" class="comments-vkpost-list__el-link" href="https://vk.com/puzatru?w=wall-25560260_16555">
                             <div class="comments-vkpost-list__el-thumb">
                                 <img src="https://pp.vk.me/c604628/v604628661/2ca7/5R_ichLg9e0.jpg" alt="">
                             </div>
                             <div class="comments-vkpost-list__el-right">
                                 <div class="comments-vkpost-list__el-name">
                                     Александр Деменев
                                 </div>
                                 <div class="comments-vkpost-list__el-comment">
                                     Спасибо Роман и благодарность всей команде Пузат.ру за классное обучение и подготовку. Все было классно! Очень жаль что время пролетело так быстро, было круто!
                                 </div>
                                 <div class="comments-vkpost-list__el-date">
                                     7 ноя в 22:07
                                 </div>
                             </div>
                         </a>
                    </div>
                    <div class="comments-vkpost-list__el">
                         <a target="_blank" class="comments-vkpost-list__el-link" href="https://vk.com/puzatru?w=wall-25560260_16558">
                             <div class="comments-vkpost-list__el-thumb">
                                 <img src="https://pp.vk.me/c413623/v413623350/7cb2/kblog80UMUE.jpg" alt="">
                             </div>
                             <div class="comments-vkpost-list__el-right">
                                 <div class="comments-vkpost-list__el-name">
                                     Сергей Плут
                                 </div>
                                 <div class="comments-vkpost-list__el-comment">
                                     спасибо большое , команда Пузат и Андрей Морковин - просто молодцы. Сделали качественный марафон с очень плотным потоком информации. теперь только внедрять и внедрять!!! Всем успехов и радости в жизни 😊
                                 </div>
                                 <div class="comments-vkpost-list__el-date">
                                     7 ноя в 22:08
                                 </div>
                             </div>
                         </a>
                    </div>
                    <div class="comments-vkpost-list__el">
                         <a target="_blank" class="comments-vkpost-list__el-link" href="https://vk.com/puzatru?w=wall-25560260_16560">
                             <div class="comments-vkpost-list__el-thumb">
                                 <img src="https://pp.vk.me/c624227/v624227620/3f3f6/k6DY60fNV4s.jpg" alt="">
                             </div>
                             <div class="comments-vkpost-list__el-right">
                                 <div class="comments-vkpost-list__el-name">
                                     Марина Селезнёва
                                 </div>
                                 <div class="comments-vkpost-list__el-comment">
                                     Это один из самых удачных онлайн-курсов, особенно в направлении создания сайта с нуля для "чайников"). Много бонусов и полезных сервисов, отличная обратная связь и разбор вопросов специалистами в вк-группе. Теперь есть пошаговый , а главное, понятный алгоритм по созданию сайта. Как новичку, было местами трудно. Чистку и группировку СЯ ручками запомню надолго))) Осталось применить на практике оформление сайта и статей+реклама. Сейчас после окончания марафона буду заниматься наполнением и, надеюсь, к весне будут небольшие результаты. В дальнейшем в планах в 2017-ом "Эволюция".
                                 </div>
                                 <div class="comments-vkpost-list__el-date">
                                     7 ноя в 22:11
                                 </div>
                             </div>
                         </a>
                    </div>
                    <div class="comments-vkpost-list__el">
                         <a target="_blank" class="comments-vkpost-list__el-link" href="https://vk.com/puzatru?w=wall-25560260_16561">
                             <div class="comments-vkpost-list__el-thumb">
                                 <img src="https://pp.vk.me/c837439/v837439212/b406/osW2q5E5ZiA.jpg" alt="">
                             </div>
                             <div class="comments-vkpost-list__el-right">
                                 <div class="comments-vkpost-list__el-name">
                                     Дей Мосюков
                                 </div>
                                 <div class="comments-vkpost-list__el-comment">
                                     Мне очень понравилась атмосфера, работа команды и чувство единения в достижении цели вызывает желание расправить крылья)
                                 </div>
                                 <div class="comments-vkpost-list__el-date">
                                     7 ноя в 22:16
                                 </div>
                             </div>
                         </a>
                    </div>
                    <div class="comments-vkpost-list__el">
                         <a target="_blank" class="comments-vkpost-list__el-link" href="https://vk.com/puzatru?w=wall-25560260_16564">
                             <div class="comments-vkpost-list__el-thumb">
                                 <img src="https://pp.vk.me/c1499/u13562929/d_9bf06495.jpg" alt="">
                             </div>
                             <div class="comments-vkpost-list__el-right">
                                 <div class="comments-vkpost-list__el-name">
                                     Александр Никулин
                                 </div>
                                 <div class="comments-vkpost-list__el-comment">
                                     Все-таки Роман очень харизматичная личность! Такой проект двигает, умеет заинтересовать и замотивировать! Я думаю что нам повезло, и мы оказались в нужное время и в нужном месте. И я рад что пошел именно на "Начало", это как раз то, что мне было нужно на данном этапе. Может где то и были недоработки или возникали неясности. Но мы получили главное - саму идею и пошаговый план её реализации. А в остальном разберемся со временем.Так что если о чем и жалею, то о том что в далеком 2013 не слышал слово "Пузат".))) Хочу поблагодарить всех наших преподавателей, тех поддержку и всех тех кто остался за кадром! Ребята вы делаете большое, интересное, правильное дело и именно по этому оно растет, развивается и год от года крепнет! Интересно будет посмотреть, во что это все превратится через 20 лет))), а может и принять посильное участие, кто знает.
                                 </div>
                                 <div class="comments-vkpost-list__el-date">
                                     7 ноя в 22:28
                                 </div>
                             </div>
                         </a>
                    </div>
                    <div class="comments-vkpost-list__el">
                         <a target="_blank" class="comments-vkpost-list__el-link" href="https://vk.com/puzatru?w=wall-25560260_16566">
                             <div class="comments-vkpost-list__el-thumb">
                                 <img src="https://pp.vk.me/c629401/v629401785/63a3a/Cdo-ZmxhHAM.jpg" alt="">
                             </div>
                             <div class="comments-vkpost-list__el-right">
                                 <div class="comments-vkpost-list__el-name">
                                     Анастасия Игнатьева
                                 </div>
                                 <div class="comments-vkpost-list__el-comment">
                                     Впечатления от марафона очень смешанные. С одной стороны грустно, что все закончилось, с другой куча планов, поставлены цели и задачи и надо действовать. Думаю, что полноценно марафон можно будет оценить после получения первых финансовых результатов, а сейчас пока просто эмоции и, конечно же, огромная благодарность преподавателям, организаторам и всей команде Пузат.ру
                                 </div>
                                 <div class="comments-vkpost-list__el-date">
                                     7 ноя в 22:48
                                 </div>
                             </div>
                         </a>
                    </div>
                    <div class="comments-vkpost-list__el">
                         <a target="_blank" class="comments-vkpost-list__el-link" href="https://vk.com/puzatru?w=wall-25560260_16617">
                             <div class="comments-vkpost-list__el-thumb">
                                 <img src="https://pp.vk.me/c637218/v637218260/1d424/YKIpwo7wacU.jpg" alt="">
                             </div>
                             <div class="comments-vkpost-list__el-right">
                                 <div class="comments-vkpost-list__el-name">
                                     Валерий Логвинов
                                 </div>
                                 <div class="comments-vkpost-list__el-comment">
                                     Я первый раз проходил подобного рода обучение. Возникали трудности, но в целом очень даже хорошо. По себе заметил, что нужно больше мотивации, больше отдачи, ну заразился вашим трудолюбием. Я даже и не думал что будет так интересно. Присутствовал юмор, и это здорово. Официальности и и так полно. Хочу в будущем обязательно пройти ещё один марафон, как минимум. Спасибо вам большое, с вами приятно учиться!!!
                                 </div>
                                 <div class="comments-vkpost-list__el-date">
                                     8 ноя в 13:10
                                 </div>
                             </div>
                         </a>
                    </div>
                    <div class="comments-vkpost-list__el">
                         <a target="_blank" class="comments-vkpost-list__el-link" href="https://vk.com/puzatru?w=wall-25560260_16621">
                             <div class="comments-vkpost-list__el-thumb">
                                 <img src="https://pp.vk.me/c636216/v636216399/3a0e3/xsSPy6BSJ-c.jpg" alt="">
                             </div>
                             <div class="comments-vkpost-list__el-right">
                                 <div class="comments-vkpost-list__el-name">
                                     Галина Соболь-Выскребенцева
                                 </div>
                                 <div class="comments-vkpost-list__el-comment">
                                     Спасибо, Роман и вся ваша команда. Марафон оправдал и даже превзошёл мои ожидания. Жаль, что он закончился.
                                 </div>
                                 <div class="comments-vkpost-list__el-date">
                                     8 ноя в 18:53
                                 </div>
                             </div>
                         </a>
                    </div>
                </div><!-- // .comments-vkpost-list -->
            </div>

        </div><!-- // .b-comments-vkpost -->
        */ ?>

        <?php
        if(false){ //checkSentPackage($form->form['events'])

        }else{ ?>
                <?php /* if(is_user_logged_in()){ ?>
                    <div class="marafon2-form__top-before marafon2-form__top-before_first" style="display: none;">
                        Укажите или&nbsp;исправьте ваше имя и&nbsp;телефон, если&nbsp;они указаны неверно.
                    </div>
                <?php } elseif(!is_user_logged_in()){?>
                    <div class="marafon2-form__top-before marafon2-form__top-before_first" style="display: none;">
                        Укажите ваш&nbsp;email, чтобы&nbsp;записаться на&nbsp;курс
                    </div>
                    <div class="marafon2-form__top-before marafon2-form__top-before_second" style="display: none;">
                        Чтобы завершить регистрацию, укажите ваше&nbsp;имя и&nbsp;номер телефона
                    </div>
                <?php } */ ?>
                <script>
                    // (function($){
                    //     $(document).ready(function(){

                    //         $('.marafon2-form__next-btn').on('click', function(){
                    //             $('.marafon2-form__top-before').hide();
                    //             $('.marafon2-form__top-before_second').show();
                    //         });
                    //         if($('.courseRegForm').length != 0){
                    //             $('.marafon2-form__top-before_first').show();
                    //             $('.courseRegForm').prepend($('.marafon2-form__top-before'));
                    //         }

                    //         if($('.timer_block').length != 0){
                    //             $('.marafon2-form_hideable').show();
                    //             $('.timer_block').prepend($('.marafon2-form_changeable'));
                    //         }
                    //     });
                    // })(jQuery);
                </script>

                <?php
                    /**
                     * Назначение переменных для блока с таймером в форму для а/б теста
                     * Нужно удалить в том случае если не подойдёт
                     * $eventPremium - текущая цена перемиум аккаунта марафона начало
                     * $fullPrice - окончательная цена после всех повышений
                     * $economyPrice - экономия которую получает пользователь если оплатит
                     */
                    $eventPremium = new puzatEvents($form->form['events'][1]);
                    $fullPrice = 34900;
                    $economyPrice = \Yii::$app->formatter->asInteger($fullPrice - $eventPremium->event['price']);
                ?>
                <div style="display:none;">
                    <?php
                        /**
                         * скрытый блок с 3 элементами содержащими данные
                         * для последующего их добавления в блок формы,
                         * загружаемый через сервис Дильшата
                         */
                    ?>
                    <span id="globalTime"><?=time()?></span>
                    <span id="mktime"><?= mktime(12, 0, 0, 3, 2, 2018)?></span>
                    <span id="economyPrice"><?= $economyPrice ?></span>
                </div>

                <script>
                    // JS Код для блока с а/б тестом
                    var seconds= parseInt($('#globalTime').text());
                    var timeend= parseInt($('#mktime').text());
                    var economy = $('#economyPrice').text();
                    $('#economyBox').text(economy);

                    function bestPriceTime() {

                        today = Math.floor(timeend-seconds);
                        if(today>=0){
                            tsec=today%60; today=Math.floor(today/60); if(tsec<10)tsec='0'+tsec;
                            tmin=today%60; today=Math.floor(today/60); if(tmin<10)tmin='0'+tmin;
                            thour=today%24; today=Math.floor(today/24);
                            timestr=today +" дней "+ thour+" часов "+tmin+" минут "+tsec+" секунд";
                            document.getElementById('bestPriceDays').innerHTML=today;
                            document.getElementById('bestPriceHours').innerHTML=thour;
                            document.getElementById('bestPriceMinutes').innerHTML=tmin;
                            document.getElementById('bestPriceSeconds').innerHTML=tsec;
                            seconds++;
                            window.setTimeout("bestPriceTime()",1000);
                        }
                    }

                    $(window).load(function(){
                        if($('#bestPriceTimer').length != 0){
                            bestPriceTime();
                        }
                    });
                </script>

                <?php //the_content(); ?>

            <?php
        } ?>

        <?php if(checkSentPackage($form->form['events'])){?>
            <?php if ($buttonConfig) { ?>
                <div style="padding: 40px 0;text-align: center;background: #101c2f;">
                    <?php echo Html::a($buttonConfig['text'], $buttonConfig['url'], $buttonConfig['options']); ?>
                </div>
            <?php } ?>
        <?php } ?>

        <?php
            // Подключение блока с виджетом вк комментов для марафонов
            include('through_templates/marafon_vk_comments.php');
        ?>


    </div>
    <!--/конец кода для лендинга-->

    <div class="students-sites-popup" style="display: none;">

        <div class="students-sites-element__flx">

            <div class="students-sites-popup__inner">

                <div class="students-sites-popup__close-btn"></div>
                <div class="students-sites-popup_changeable students-sites-element__flx">

                    <div class="students-sites-popup__img-wrapper">
                        <img class="students-sites-popup__img" src="/wp-content/themes/puzatru/img/students-sites-element__img3_not-preview.jpg">
                        <div class="students-sites-popup__arrow"></div>
                    </div>

                </div>


            </div><!-- // .students-sites-popup__inner -->

        </div>

    </div><!-- // .students-sites-popup -->

    <?php get_footer(); ?>
        <script src="<?php echo get_template_directory_uri(); ?>/js/scrollax.min.js"></script>
        <script src="<?=get_template_directory_uri(); ?>/js/bx-slider/jquery.bxslider.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script> -->
        <script>window.Vue || document.write('<script src="<?=get_template_directory_uri(); ?>/js/vue.min.js"><\/script>')</script>
        <script src="<?=get_template_directory_uri(); ?>/pages/pages_js/nachalo.js?ver=<?= $clientVersion ?>"></script>
