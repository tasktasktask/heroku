<?php
namespace models;

use libs\Msg;

class TodoModel extends AbstractModel {

	public int $id;
	public string $user_id;
	public string $title;
	public string $memo;
	public int $progress;
	public int $del_flg;

	protected static $SESSION_NAME = '_todo';

	public function isValidId() {
		return static::validateId($this->id);
	}

	public static function validateId($val) {
		$res = true;
		if (empty($val) || !is_numeric($val)) {
			Msg::push(Msg::ERROR, "パラメータが不正です。");
			$res = false;
		}
		return $res;
	}

	public function isValidTitle() {
		return static::validateTitle($this->title);
	}

	public static function validateTitle($val) {
		$res = true;
		if (empty($val)) {
			Msg::push(Msg::ERROR, "Todoを入力してください。");
			$res = false;
		} else {
			if ((mb_strlen($val) <= 1 || mb_strlen($val) > 50) ||
				(strlen($val) <= 1 && strlen($val) > 50)) {
				Msg::push(Msg::ERROR, "Todoは1〜50文字以内で入力してください。");
				$res = false;
			}
		}
Msg::push(Msg::DEBUG, mb_strlen($val));
		return $res;
	}

	public function isValidMemo() {
		return static::validateMemo($this->memo);
	}

	public static function validateMemo($val) {
		$res = true;
		// if (mb_strlen($val) > 200) {
		// 	Msg::push(Msg::ERROR, "メモは200文字以内で入力してください。");
		// 	$res = false;
		// }
		return $res;
	}

	public function isValidProgress() {
		return static::validateProgress($this->progress);
	}

	public static function validateProgress($val) {
		$res = true;
		if ($val < 0 && $val > 100) {
			Msg::push(Msg::ERROR, "進捗は0~100で表してください。");
			$res = false;
		}
		return $res;
	}

}
