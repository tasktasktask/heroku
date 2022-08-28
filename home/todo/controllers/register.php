<?php
namespace controller\register;

use models\UserModel;
use libs\Auth;
use libs\Msg;

function get() {

	\views\register\index();

}

function post() {

	$user = new UserModel;
	$user->id = get_param('id', '');
	$user->username = get_param('username', '');
	$user->pwd = get_param('pwd', '');

	if (Auth::regist($user)) {
		Msg::push(Msg::INFO, "{$user->username}さん、ようこそ。");
		redirect(GO_HOME);
	} else {
		redirect(GO_REFERER);
	}
}
