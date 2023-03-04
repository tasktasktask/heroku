<?php
require_once './datasource.php';

use db\DataSource;
$db = new DataSource;

$result = $db->inc_db();
echo '<pre>';
print_r($result);
echo '<pre>';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Db Practice</title>
</head>
<body>
	<h1>Welcome to Db Practice!!</h1>
</body>
</html>
