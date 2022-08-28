<?php
namespace libs;

use db\UserQuery;
use models\UserModel;

class Auth {
	public static function regist($user) {
		if (!($user->isValidId($user->id)
			* $user->isValidUsername($user->username)
			* $user->isValidPwd($user->pwd))) {
				return false;
		}

		$is_success = false;

		$exist_user = UserQuery::fetchById($user->id);
		if (!empty($exist_user)) {
			Msg::push(Msg::ERROR, 'ユーザーが既に存在します。');
			return false;
		}

		$user->pwd = password_hash($user->pwd, PASSWORD_DEFAULT);

		$is_success = UserQuery::insert($user);

		if ($is_success) {
			UserModel::setSession($user);
		}

		return $is_success;
	}

	public static function login($id, $pwd) {
		if (!(UserModel::validateId($id)
			* UserModel::validatePwd($pwd))) {
				return false;
		}

		$is_success = false;

		$user = UserQuery::fetchById($id);

		if (!empty($user) && $user->del_flg !== 1) {
			if (password_verify($pwd, $user->pwd)) {
				$is_success = true;
				UserModel::setSession($user);
			} else {
				Msg::push(Msg::ERROR, 'パスワードが一致しません。');
			}
		} else {
			Msg::push(Msg::ERROR, 'ユーザーが見つかりません。');
		}

		return $is_success;
	}

	public static function logout() {
		UserModel::clearSession();

		return true;
	}

	public static function isLogin() {
		$user = UserModel::getSession();

		if (isset($user)) {
			return true;
		} else {
			return false;
		}
	}

	public static function requireLogin() {
		if (!static::isLogin()) {
			Msg::push(Msg::ERROR, 'ログインしてください。');
			redirect('login');
		}
	}
}
