<?php
// if (empty($_SERVER['HTTPS'])) {
// 	$server = "http://";
// } else {
// 	$server = "https://";
// }

// echo 'check https:' . $server . '<br>';
// echo 'HTTP_HOST:' . $_SERVER['HTTP_HOST'] . '<br>';
// echo 'server_name:' . $_SERVER['SERVER_NAME'] . '<br>';
// echo 'php_self:' . $_SERVER['PHP_SELF'] . '<br>';
// echo 'UA:' . $_SERVER['HTTP_USER_AGENT'] . '<br>';
// echo 'URI:' . $_SERVER['REQUEST_URI'] . '<br>';
// echo 'PATH_INFO:' . $_SERVER['PATH_INFO'] . '<br>';

?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<header>
		<h1>Tasuku Work</h1>
	</header>
	<main>
		<div class="m-5 bg-danger">
			<a href="<?php echo './home/poll/'; ?>" class="text-body" target="_blank">Poll Site</a>
		</div>
		<div class="m-5 bg-primary">
			<a href="<?php echo './home/quiz/html'; ?>" class="text-body" target="_blank">Quiz Site</a>
		</div>
		<div class="m-5 bg-success">
			<a href="<?php echo './home/todo'; ?>" class="text-body" target="_blank">Todo Site</a>
		</div>
		<div class="m-5 bg-warning">
			<a href="<?php echo './home/db'; ?>" class="text-body" target="_blank">Db Site</a>
		</div>
	</main>
	<footer>

	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
