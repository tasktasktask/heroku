<?php
	namespace libs;

	// use Throwable;
	// use Error;

	function route($rpath, $method) {


		if($rpath === '') {
			$rpath = 'home';
		}

		$targetFile = CONTROLLER_PATH . "{$rpath}.php";

		if(!file_exists($targetFile)) {
			require_once VIEWS_PATH . "404.php";
			return;
		}

		require_once $targetFile;

		$rpath = str_replace('/', '\\', $rpath);
		$fn = "\\controller\\{$rpath}\\{$method}";

		$fn();



	}
