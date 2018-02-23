<?php
define('IS_PHAR', strpos(dirname(__FILE__), 'phar://') === 0);
define('DIR_SRC', IS_PHAR ? dirname(Phar::running(false)) : substr( dirname(__FILE__), 0, strlen(dirname(__FILE__)) - 4));
define('DIR_ROOT',  substr( dirname(__FILE__), 0, strlen(dirname(__FILE__)) - 4) );


define('ENVIRONMENT_FILE', DIR_SRC . '/.environment');

if (!file_exists(ENVIRONMENT_FILE)) die('File "' . ENVIRONMENT_FILE . '" not exist');

$params = parse_ini_file(ENVIRONMENT_FILE);

$requiredParams = array(
    'DATABASE_DRIVER',
    'DATABASE_HOST',
    'DATABASE_NAME',
    'DATABASE_USER',
    'DATABASE_PASSWORD',
    'VERSION_TABLE_NAME',
    'FILE_EXTENSION',
    'DIR_MIGRATION',
    'DIR_DBSTATE',
    'DEFAULT_DESCRIPTION_MESSAGE',
);

array_map(function ($name) use ($params) {
    if (!isset($params[$name])) {
        die('Param ' . $name . ' not set in file ' . ENVIRONMENT_FILE);
    }
}, $requiredParams);


defined('DATABASE_DRIVER') or define('DATABASE_DRIVER', $params['DATABASE_DRIVER']);
defined('DATABASE_HOST') or define('DATABASE_HOST', $params['DATABASE_HOST']);
defined('DATABASE_NAME') or define('DATABASE_NAME', $params['DATABASE_NAME']);
defined('DATABASE_USER') or define('DATABASE_USER', $params['DATABASE_USER']);
defined('DATABASE_PASSWORD') or define('DATABASE_PASSWORD', $params['DATABASE_PASSWORD']);

define('DATABASE_DSN', DATABASE_DRIVER . ':host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME);

define('VERSION_CONTROL_STRATEGY', isset($params['VERSION_CONTROL_STRATEGY']) ? $params['VERSION_CONTROL_STRATEGY'] : null);

if (isset($params['DATABASE_HOST_SECONDARY'])) {
    define('DATABASE_HOST_SECONDARY', $params['DATABASE_HOST_SECONDARY']);
    define('DATABASE_NAME_SECONDARY', $params['DATABASE_NAME_SECONDARY']);
    define('DATABASE_USER_SECONDARY', $params['DATABASE_USER_SECONDARY']);
    define('DATABASE_PASSWORD_SECONDARY', $params['DATABASE_PASSWORD_SECONDARY']);

    define('DATABASE_DSN_SECONDARY', DATABASE_DRIVER . ':host=' . DATABASE_HOST_SECONDARY . ';dbname=' . DATABASE_NAME_SECONDARY);
}

define('VERSION_TABLE_NAME', $params['VERSION_TABLE_NAME']);

define('FILE_EXTENSION', $params['FILE_EXTENSION']);

defined('DIR_MIGRATION') or define('DIR_MIGRATION', strpos($params['DIR_MIGRATION'], 'DIR_ROOT') === 0 ? DIR_SRC . str_replace('DIR_ROOT', '', $params['DIR_MIGRATION']) : $params['DIR_MIGRATION']);
define('DIR_DBSTATE', strpos($params['DIR_DBSTATE'], 'DIR_ROOT') === 0 ? DIR_SRC . str_replace('DIR_ROOT', '', $params['DIR_DBSTATE']) : $params['DIR_DBSTATE']);

define('DEFAULT_DESCRIPTION_MESSAGE', str_replace(array('CURRENT_USER', 'CURRENT_DATE'), array(get_current_user(), date('Y-m-d H:i:s')), $params['DEFAULT_DESCRIPTION_MESSAGE']));


spl_autoload_register(function ($className) {
    $className = str_replace(array('\\'), array('/'), $className);
    $path = DIR_ROOT . '/src/' . $className . '.php';
    // echo $path.'<br />'."\n";
    if (file_exists($path)) {
        require_once $path;
        return;
    }
   // throw new Exception('Class ' . $className . ' not found');
});