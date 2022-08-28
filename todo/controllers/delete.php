<?php
namespace controller\delete;

use db\TodoQuery;
use libs\Auth;
use libs\Msg;
use models\TodoModel;
use models\UserModel;

function get() {
	Auth::requireLogin();

	$todo = new TodoModel;
	$todo->id = get_param("id", '', false);
	$user = UserModel::getSession();

	$is_success = TodoQuery::delete($user, $todo);

	if ($is_success) {
		Msg::push(Msg::INFO, 'Todoを削除しました。');
	} else {
		Msg::push(Msg::ERROR, 'Todoの削除に失敗しました。');
	}

	redirect(GO_HOME);
}
