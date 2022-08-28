<?php
namespace controller\logout;

use libs\Auth;
use libs\Msg;

function get() {

	Auth::logout();
	Msg::push(Msg::INFO, 'ログアウトしました。');

	redirect(GO_HOME);
}
