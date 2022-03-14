<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Требования:
<ul>
    <li>Laravel version 7.5+</li>
    <li>Проект предоставить ссылкой на репозиторий с README</li>
</ul>

Описание логики:
Роль админ:
<ul>
<li>операции CRUD для менеджеров</li>
<li>операции CRUD для Тестов</li>
</ul>

Роль менеджер:
<ul>
<li>Только Возможность проставлять оценки для тестов к которым есть доступ</li>
</ul>

Сущность ТЕСТ:
<ul>
<li>ФИО испытуемого</li>
<li>Дата проведения теста</li>
<li>Локация проведения теста</li>
<li>Оценка</li>
<li>Критерий на основе оценки</li>
<li>Ответственный менеджер</li>
</ul>

Задача:
<ul>
<li>Реализовать описанную логику</li>
<li>Расчет критерия на основе оценки реализовать и на бэке и на фронте</li>
<li>За основу внешки взять шаблон Vuexy</li>
</ul>
