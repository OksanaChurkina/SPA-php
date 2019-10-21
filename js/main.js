var app = (function() {

    // Загрузим конфиг из data/config.json
    var config = {};

    var ui = {
        $body: $('body'),
        $menu: $('#menu'),
        $pageTitle: $('#page-title'),
        $content: $('#content')
    };

    // Загрузка контента по странице
    function _loadPage(page) {
        var url = 'pages/' + page + '.html',
            pageTitle = config.pages[page].title,
            menu = config.pages[page].menu;

        $.get(url, function(html) {
            document.title = pageTitle + ' | ' + config.siteTitle;
            ui.$menu.find('a').removeClass('active');
            ui.$menu.find('a[data-menu="' + menu + '"]').addClass('active');
            ui.$pageTitle.html(pageTitle);
            ui.$content.html(html);
        });
    }

    // Клик по ссылке
    function _navigate(e) {
        e.stopPropagation();
        e.preventDefault();

        var page = $(e.target).attr('href');

        _loadPage(page);
        history.pushState({page: page}, '', page);
    }

    // Кнопки Назад/Вперед
    function _popState(e) {
        var page = (e.state && e.state.page) || config.mainPage;
        _loadPage(page);
    }

    // Привязка событий
    function _bindHandlers() {
        ui.$body.on('click', 'a[data-link="ajax"]', _navigate);
        window.onpopstate = _popState;
    }

    // Старт приложения: привязка событий
    function _start() {
        _bindHandlers();
    }

    // Инициализация приложения: загрузка конфига и старт
    function init() {
        $.getJSON('/data/config.json', function(data) {
            config = data;
            _start();
        });
    }

    // Возвращаем наружу
    return {
        init: init
    }
})();

// Запуск приложения
$(document).ready(app.init);