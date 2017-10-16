<?php
// HTTP
define('HTTP_SERVER', 'http://localhost/gsmcomponentes/');

// HTTPS
define('HTTPS_SERVER', 'http://localhost/gsmcomponentes/');

// DIR
define('DIR_APPLICATION', '/var/www/html/gsmcomponentes/catalog/');
define('DIR_SYSTEM', '/var/www/html/gsmcomponentes/system/');
define('DIR_LANGUAGE', '/var/www/html/gsmcomponentes/catalog/language/');
define('DIR_TEMPLATE', '/var/www/html/gsmcomponentes/catalog/view/theme/');
define('DIR_CONFIG', '/var/www/html/gsmcomponentes/system/config/');
define('DIR_IMAGE', '/var/www/html/gsmcomponentes/image/');
define('DIR_STORAGE', DIR_SYSTEM . 'storage/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'unlockt0_OpenCartData');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');
