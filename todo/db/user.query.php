<?php
namespace db;

use db\DataSource;
use models\UserModel;

class UserQuery {
	public static function fetchById($id) {
		$db = new DataSource;
		$sql = 'select * from users where id = :id ;';

		$result = $db->selectOne($sql, [
			':id' => $id
		], DataSource::CLS, UserModel::class);

		return $result;
	}

	public static function insert($user) {
		$db = new DataSource;
		$sql = 'insert into users (id, pwd, username) values (:id, :pwd, :username);';

		$result = $db->execute($sql, [
			':id' => $user->id,
			':pwd' => $user->pwd,
			':username' => $user->username,
		]);

		return $result;
	}
}
