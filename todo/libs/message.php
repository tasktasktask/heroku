<?php
namespace libs;

use models\AbstractModel;

class Msg extends AbstractModel {
	protected static $SESSION_NAME = '_msg';
	public const ERROR = 'error';
	public const INFO = 'info';
	public const DEBUG = 'debug';

	public static function push($type, $msg) {
		if (!is_array(static::getSession())) {
			static::init();
		}
		$msgs = static::getSession();
		$msgs[$type][] = $msg;
		static::setSession($msgs);
	}

	public static function flush() {
		$msgs_with_type = static::getSessionAndFlush() ?? [];

		echo '<div id="messages">';

		foreach ($msgs_with_type as $type => $msgs) {
			if ($type === static::DEBUG && !DEBUG) {
				continue;
			}

			switch ($type) {
				case static::INFO:
					$color = 'alert-info';
					break;
				case static::ERROR:
					$color = 'alert-danger';
					break;

				default:
					$color = 'alert-warning';
					break;
			}
			// $color = $type === static::INFO ? 'alert-info' : 'alert-danger';

			foreach ($msgs as $msg) {
				echo "<div class='alert $color'>{$msg}</div>";
			}
		}

		echo '</div>';
	}

	private static function init() {
		static::setSession([
			static::ERROR => [],
			static::INFO => [],
			static::DEBUG => [],
		]);
	}

}
