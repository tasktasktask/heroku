<?php
define('CURRENT_URI', $_SERVER['REQUEST_URI']);
// if (preg_match("/todo/", CURRENT_URI, $match)) {

	// define('CONTEXT_PATH', $match[0].'/');
	define('CONTEXT_PATH', '/todo/');
// }


define('ROOT_PATH', __DIR__ . '/');
define('SOURCE_PATH', ROOT_PATH . 'app/');
define('CONTROLLER_PATH', ROOT_PATH . 'controllers/');
define('LIBS_PATH', ROOT_PATH . 'libs/');
define('DB_PATH', ROOT_PATH . 'db/');
define('MODELS_PATH', ROOT_PATH . 'models/');
define('VIEWS_PATH', ROOT_PATH . 'views/');

define('DEBUG', true);

define('GO_HOME', 'home');
define('GO_REFERER', 'referer');


// echo CURRENT_URI . "<br>";
// echo CONTEXT_PATH . "<br>";
// echo ROOT_PATH . "<br>";
// echo SOURCE_PATH . "<br>";
// echo LIBS_PATH . "<br>";
// echo VIEWS_PATH . "<br>";
// echo CSS_PATH . "<br>";
// echo JS_PATH . "<br>";
