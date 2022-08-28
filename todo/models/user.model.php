<?php
namespace models;

use libs\Msg;

class UserModel extends AbstractModel {

	public string $id;
	public string $username;
	public string $pwd;
	public int $del_flg;

	protected static $SESSION_NAME = '_user';

	public function isValidId() {
		return static::validateId($this->id);
	}

	public static function validateId($val) {
		$res = true;
		if (empty($val)) {
			Msg::push(Msg::ERROR, "IDを入力してください。");
			$res = false;
		} else {
			if (strlen($val) <= 0 || strlen($val) > 20) {
				Msg::push(Msg::ERROR, "1〜20文字以内で入力してください。");
				$res = false;
			}

			if (!is_alnum($val)) {
				Msg::push(Msg::ERROR, "半角英数字で入力してください。");
				$res = false;
			}
		}
		return $res;
	}

	public function isValidUsername() {
		return static::validateUsername($this->username);
	}

	public static function validateUsername($val) {
		$res = true;
		if (empty($val)) {
			Msg::push(Msg::ERROR, "ユーザーネームを入力してください。");
			$res = false;
		} else {
			if (mb_strlen($val) < 0 || mb_strlen($val) > 20) {
				Msg::push(Msg::ERROR, "0〜20文字以内で入力してください。");
				$res = false;
			}
		}
		return $res;
	}

	public function isValidPwd() {
		return static::validatePwd($this->pwd);
	}

	public static function validatePwd($val) {
		$res = true;
		if (empty($val)) {
			Msg::push(Msg::ERROR, "パスワードを入力してください。");
			$res = false;
		} else {
			if (strlen($val) < 4) {
				Msg::push(Msg::ERROR, "4文字以上で入力してください。");
				$res = false;
			}

			if (!is_alnum($val)) {
				Msg::push(Msg::ERROR, "半角英数字で入力してください。");
				$res = false;
			}
		}
		return $res;
	}

}
