<?php
namespace db;

use PDO;

class DataSource
{

	public static $host = 'localhost';
	public static $port = '8889';
	public static $dbName = 'todo_db';
	public static $username = 'test_user';
	public static $password = 'pwd';
	public static $id = 'test';

	public function inc_db()
	{

		// $host = 'localhost';
		// $port = '8889';
		// $dbName = 'todo_db';
		// $username = 'test_user';
		// $password = 'pwd';
		// $id = 'test';

		$host = 'us-cdbr-east-06.cleardb.net';
		$port = '3306';
		$dbName = 'heroku_43fb1cc2d968461';
		$username = 'b27726eb68fdfe';
		$password = '07cb6885';
		$id = 'test';

		$dsn = "mysql:host={$host};port={$port};dbname={$dbName};";


		$conn = new PDO($dsn, $username, $password);
		$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		$sql = 'select * from todo_db.users where id=:id';

		$stmt = $conn->prepare($sql);
		$stmt->execute([
			':id' => $id
		]);
		return $stmt->fetchAll();
	}
}
