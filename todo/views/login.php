<?php
namespace views\login;

function index() {
?>
<body>
	<div class="container">
		<header class="container my-2">
			<nav class="row align-items-center py-2">
				<a href="/todo" class="col-md d-flex align-items-center mb-3 mb-md-0">
					<span class="h2 font-weight-bold mb-0">My Todo List</span>
				</a>
				<!-- <div class="col-md-auto">
					<a href="add.html" class="btn btn-success mr-2">投稿</a>
					<a href="login.html" class="btn btn-primary">ログイン</a>
				</div> -->
			</nav>
		</header>


		<main class="container">
			<div id="massage"></div>
			<h1 class="sr-only">ログイン</h1>

			<div class="login-form mx-auto bg-white my-5 p-4 shadow-sm rounded">
				<div class="text-center mb-5 text-info">
					<h2>__Task Todo Site</h2>
				</div>

				<form action="" method="POST" class="validate-form" autocomplete="off">
					<div class="form-group">

						<label for="id">ユーザーID</label>
						<input id="id" name="id" type="text" class="form-control" required>
						<div class="invalid-feedback"></div>
					</div>
					<div class="form-group">

						<label for="pwd">パスワード</label>
						<input id="pwd" name="pwd" type="password" class="form-control">
					</div>
					<div class="d-flex align-items-center justify-content-between">
						<a href="/todo/register">アカウント登録</a>
						<input type="submit" value="ログイン" class="btn btn-primary">
					</div>
				</form>
			</div>


		</main>

<?php
}
?>
