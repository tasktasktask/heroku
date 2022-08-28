<?php

	require_once "config.php";

	require_once MODELS_PATH."abstract.model.php";
	require_once MODELS_PATH."user.model.php";
	require_once MODELS_PATH."todo.model.php";

	require_once LIBS_PATH."auth.php";
	require_once LIBS_PATH."message.php";
	require_once LIBS_PATH."functions.php";
	require_once LIBS_PATH."router.php";

	require_once DB_PATH."datasource.php";
	require_once DB_PATH."user.query.php";
	require_once DB_PATH."todo.query.php";

	require_once VIEWS_PATH."header.php";
	require_once VIEWS_PATH."home.php";
	require_once VIEWS_PATH."register.php";
	require_once VIEWS_PATH."login.php";
	require_once VIEWS_PATH."footer.php";

	use function \libs\route;

	session_start();

	$url = parse_url(CURRENT_URI);
// var_dump($url);
	$rpath = str_replace(CONTEXT_PATH, "", $url['path']);
// echo $rpath.'<br>';
	$method = strtolower($_SERVER['REQUEST_METHOD']);
// echo $method.'<br>';

	\views\header('Todo List');

	route($rpath, $method);

	\views\footer();


?>
