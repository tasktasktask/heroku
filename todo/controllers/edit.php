<?php
namespace controller\edit;

use db\TodoQuery;
use libs\Auth;
use libs\Msg;
use models\TodoModel;
use models\UserModel;
use Throwable;

	// function get() {
	// }

	function post() {
		Auth::requireLogin();

		$todo = new TodoModel;
		$todo->id = get_param('id', null);
		$todo->title = get_param('title', null);
		$todo->memo = get_param('memo', '');
		$todo->progress = intval(get_param('progress', 0));

		$user = UserModel::getSession();
		try {
			$is_success = TodoQuery::update($user, $todo);
		} catch(Throwable $e) {
			Msg::push(Msg::DEBUG, $e->getMessage());
			$is_success = false;
		}

		if ($is_success) {
			Msg::push(Msg::INFO, 'Todoの修正に成功しました。');
		} else {
			Msg::push(Msg::ERROR, 'Todoの修正に失敗しました。');
			TodoModel::setSession($todo);
		}


		redirect(GO_HOME);
	}
