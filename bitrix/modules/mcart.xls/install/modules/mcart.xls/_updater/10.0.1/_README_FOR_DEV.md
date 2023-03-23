# README #

## Внимание ##
Наименования служебных файлов и папок (которых не должно быть в сборке) начинаются с подчеркивания.

## Сборка обновления ##

1) В архиве следующие файлы должны быть в кодировке windows-1251:
/description.ru
/lang/ru/install/index.php
/lang/en/install/index.php
/lang/de/install/index.php

2) Также в корне должен лежать аржив "lang_in_utf8.zip" с ланг-файлами в кодировке utf-8.
То есть в нем должны быть папки "ru", "en", "de" и т. д.
НО в нем не должно быть папок "/ru/install/", "/en/install/", "/de/install/" и т. д. - эти папки должны быть стандартно в корне модуля в папке "/lang".

3) В файлах "/updater.php" и "install/index.php" должны быть написаны методы для конвертации ланг-файлов из "/lang_in_utf8.zip" в "/lang".