<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи и ABSPATH. Дополнительную информацию можно найти на странице
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется скриптом для создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения вручную.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'treningi');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '1234qQ1!');

/** Имя сервера MySQL */
define('DB_HOST', '23.94.63.218');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'QA<!lpa~gy@B9@D}e.!DNB x^9mzbuPCAn0A@{nnXac7H!j|.^Q`+4Es5J?ku.G0');
define('SECURE_AUTH_KEY',  '^J175SLSIc <8srXr)Z><Ip@y@Lp~)0F?pTVb^>{xiL0OPbJF[4-NL+5O|4iTGiZ');
define('LOGGED_IN_KEY',    '7wE^cGhB)wcMsu}jAD+4QYyB8r/H@][<<Bqsn&-m@[XH~WE-d{+BI}d3q[lI!kg]');
define('NONCE_KEY',        'r#gkWZo~$Xlc4.8Y/8)M*iyepb0E|wuc]vu]h-rAoJ~(+#B!nl.nA`sj+%MJ3|F-');
define('AUTH_SALT',        'H#Fbj;ddgK(X^bg{-}+Ex1@(:bYr^==r ~,Bp,834Ij0/$@D]k>O:>2KQNOw@9;B');
define('SECURE_AUTH_SALT', '-DKnXq1cq.&G0j$ZT<F+`Wm!)6RL_QYwSdA.aLT`W)7QHxy_go3haL_<2$x.:0L;');
define('LOGGED_IN_SALT',   'xQ ofDC19%6Fa:FQ3u+Mi@la[LB`7#bE-5%trm-U$b+-gTm6GhHD)0-KD}n|Vc6(');
define('NONCE_SALT',       'vpDZ|$9I>m:S`sPZy|$zXUp$iz+c#0lB2oma:hn#nUpW?xD,_g5R|0!m4V=|hBF:');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');

