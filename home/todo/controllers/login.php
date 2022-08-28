<?php
namespace controller\login;

use models\UserModel;
use libs\Auth;
use libs\Msg;

function get() {

	\views\login\index();

}

function post() {
	$id = get_param('id', '');
	$pwd = get_param('pwd', '');

	if (Auth::login($id, $pwd)) {
		$user = UserModel::getSession();
		Msg::push(Msg::INFO, "{$user->username}さん、ようこそ。");
		redirect(GO_HOME);
	} else {
		redirect(GO_REFERER);
	}
}
