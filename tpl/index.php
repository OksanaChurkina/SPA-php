<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?php echo $pageTitle . ' | ' . $siteTitle ?></title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <div class="wrapper">
        <div class="spa-title">
            <b>Webdevkin SPA</b> - <a href="https://webdevkin.ru/posts/frontend/spa-history-api" target="_blank">Статья на webdevkin.ru</a>
        </div>
        <menu id="menu">
            <a href="main" data-menu="main" data-link="ajax" <?php echo ($pageMenu == 'main') ? ' class="active"' : '' ?>>На главную страницу</a>
            <a href="about" data-menu="about" data-link="ajax" <?php echo ($pageMenu == 'about') ? ' class="active"' : '' ?>>О проекте</a>
            <a href="blog" data-menu="blog" data-link="ajax" <?php echo ($pageMenu == 'blog') ? ' class="active"' : '' ?>>Блог</a>
            <a href="simpple" data-menu="simpple" data-link="ajax" <?php echo ($pageMenu == 'simpple') ? ' class="active"' : '' ?>>Проект Simpple</a>
            <a href="contacts" data-menu="contacts" data-link="ajax" <?php echo ($pageMenu == 'contacts') ? ' class="active"' : '' ?>>Контакты</a>
        </menu>
        <h2 id="page-title" class="page-title"><?php echo $pageTitle ?></h2>
        <div id="content">
            <?php echo $content ?>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>