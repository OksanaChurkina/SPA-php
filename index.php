<?php

// Вытаскиваем конфиг в ассоциативный массив
$jsonString = file_get_contents(__DIR__ . '/data/config.json');
$config = json_decode($jsonString, true);

// Определяем текущую страницу
$page = trim($_SERVER['REQUEST_URI'], '/');

// Если $page == '', то есть REQUEST_URI = '/', то эта страница главная
if ($page == '') {
    $page = $config['mainPage'];
}

// Заголовок сайта
$siteTitle = $config['siteTitle'];

// Если страница не существует, возвращаем 404 Not Found
if (!isset($config['pages'][$page])) {
    // Отдаем код 404
    header('HTTP/1.0 404 Not Found');

    // Подключаем шаблон 404 страницы
    include_once __DIR__ . '/tpl/404.php';
    die;
}

// Заголовок и меню страницы
$pageData = $config['pages'][$page];
$pageTitle = $pageData['title'];
$pageMenu = $pageData['menu'];

// Содержимое страницы
$content = file_get_contents(__DIR__ . '/pages/' . $page . '.html');

// Подключаем шаблон главной страницы
include_once __DIR__ . '/tpl/index.php';
