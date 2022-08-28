<?php
namespace controller\add;

use db\TodoQuery;
use libs\Auth;
use libs\Msg;
use models\TodoModel;
use models\UserModel;
use Throwable;

	// function get() {

	// 	\views\add\index();

	// }

	function post() {
		Auth::requireLogin();

		$todo = new TodoModel;

		$todo->title = get_param('title', null);
		$todo->memo = get_param('memo', '');
		$todo->progress = intval(get_param('progress', 0));

		try {

			$user = UserModel::getSession();
			$is_success = TodoQuery::insert($user, $todo);
		} catch(Throwable $e) {
			Msg::push(Msg::DEBUG, $e->getMessage());
			$is_success = false;
		}

		if ($is_success) {
			Msg::push(Msg::INFO, 'Todoの追加に成功しました。');
		} else {
			Msg::push(Msg::ERROR, 'Todoの追加に失敗しました。');
			TodoModel::setSession($todo);
		}


		redirect(GO_HOME);
	}
