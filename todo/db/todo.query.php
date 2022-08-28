<?php
namespace db;

use db\DataSource;
use models\TodoModel;
use models\UserModel;

class TodoQuery {
	public static function fetchById($user) {
		$db = new DataSource;
		$sql = '
		select
			*
		from todos
		where user_id = :user_id
		and del_flg != 1 order by id desc ;';

		$result = $db->select($sql, [
			':user_id' => $user->id
		], DataSource::CLS, TodoModel::class);

		return $result;
	}

	public static function insert($user, $todo) {
		if (!($user->isValidId()
			* $todo->isValidTitle()
			* $todo->isValidMemo()
			* $todo->isValidProgress())) {
				return false;
			}

		$db = new DataSource;
		$sql = '
		insert
		into todos
			(user_id, title, memo, progress)
		values
			(:user_id, :title, :memo, :progress);';

		$result = $db->execute($sql, [
			':user_id' => $user->id,
			':title' => $todo->title,
			':memo' => $todo->memo,
			':progress' => $todo->progress,
		]);

		return $result;
	}

	public static function update($user, $todo) {
		if (!($user->isValidId()
			* $todo->isValidId()
			* $todo->isValidTitle()
			* $todo->isValidMemo()
			* $todo->isValidProgress())) {
				return false;
		}
		$db = new DataSource;
		$sql = "
		update todos
		set
			title = :title,
			memo = :memo,
			progress = :progress
		where
			id = :id
		and
			user_id = :user_id;
		";

		$result = $db->execute($sql, [
			":title" => $todo->title,
			":memo" => $todo->memo,
			":progress" => $todo->progress,
			":id" => $todo->id,
			":user_id" => $user->id,
		]);

		return $result;
	}

	public static function delete($user, $todo) {
		if (!($user->isValidId()
			* $todo->isValidId())) {
				return false;
		}

		$db = new DataSource;
		$sql = "
		update todos
		set
			del_flg = 1
		where
			id = :id;
		";
		$result = $db->execute($sql, [
			":id" => $todo->id
		]);

		return $result;
	}
}
