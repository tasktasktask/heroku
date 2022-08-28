<?php

namespace views\home;

use db\TodoQuery;
use libs\Auth;
use models\UserModel;

function index()
{
	$user = UserModel::getSession();
	$todos = TodoQuery::fetchById($user);

?>

	<body>
		<div class="container">
			<header class="container my-2">
				<nav class="row align-items-center py-2">
					<a href="/todo" class="col-md d-flex align-items-center mb-3 mb-md-0">
						<span class="h2 font-weight-bold mb-0">My Todo List</span>
					</a>
					<div class="col-md-auto">
						<!-- <a href="./add" class="btn btn-success mr-2">投稿</a> -->
						<p id="add-btn" class="btn btn-success m-0 mr-2">投稿</p>
						<?php if (Auth::isLogin()) : ?>
							<a href="./logout" class="btn btn-primary">ログアウト</a>
						<?php else : ?>
							<a href="./login" class="btn btn-primary">ログイン</a>
						<?php endif; ?>
					</div>
				</nav>
			</header>


			<main>
				<?php if (Auth::isLogin()) : ?>
					<h1 class="bg-info my-5"><?php echo $user->username; ?>'s Todo</h1>
				<?php else : ?>
					<h1 class="bg-info my-5"><?php echo 'Guest'; ?>'s Todo</h1>
				<?php endif; ?>

				<div id="add-form" class="position-fixed top-50 start-50 translate-middle w-100 h-100 row align-items-center m-0 p-0 display-none">
					<div class="mx-auto w-75">
						<div class="p-5 bg-white mx-auto w-75">
							<h2 class="text-info text-center mb-5">New Todo</h2>
							<form action="./add" class="" method="POST">
								<div class="form-group">
									<label for="title">やること</label>
									<input name="title" id="title" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="memo">メモ</label>
									<textarea name="memo" id="memo" rows="10" class="form-control "></textarea>
								</div>
								<div class="form-group">
									<label for="progress">進捗</label>
									<select name="progress" id="progress">
										<?php for($i = 0; $i <= 100; $i += 10): ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php endfor; ?>
									</select>
								</div>
								<div class="form-group">
									<input type="submit" value="追加" class="btn btn-primary form-control">
								</div>
								<div class="form-group">
									<p id="add-cancel" class="text-center text-primary">キャンセル</p>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div id="edit-form" class="position-fixed top-50 start-50 zindex-position translate-middle w-100 h-100 row align-items-center m-0 p-0 display-none">
					<div class="mx-auto w-75">
						<div class="p-5 bg-white mx-auto w-75">
							<h2 class="text-info text-center mb-5">Edit Todo</h2>
							<form action="./edit" class="" method="POST">
								<input type="hidden" name="id" id="id">
								<div class="form-group">
									<label for="title">やること</label>
									<input name="title" id="title" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="memo">メモ</label>
									<textarea name="memo" id="memo" rows="10" class="form-control "></textarea>
								</div>
								<div class="form-group">
									<label for="progress">進捗</label>
									<select name="progress" id="progress">
									<?php for($i = 0; $i <= 100; $i += 10): ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php endfor; ?>
									</select>
								</div>
								<div class="form-group">
									<input type="submit" value="追加" class="btn btn-primary form-control">
								</div>
								<div class="form-group">
									<p id="edit-cancel" class="text-center text-primary">キャンセル</p>
								</div>
							</form>
						</div>
					</div>
				</div>

				<ul class="container">
					<?php foreach($todos as $todo): ?>
					<li class="row bg-white shadow-sm mb-3 roujsnded p-3">
						<div class="col-11"></div>
						<div class="col-1 text-right">
							<a href="./delete?id=<?php echo $todo->id; ?>" class="text-body mt-1">
								<i class="fa-solid fa-x"></i>
							</a>
						</div>
						<div class="todo align-items-center" data-id="<?php echo $todo->id; ?>">
							<!-- <h2 class="mb-2 mb-md-0 row"> -->
							<!-- <div class="row align-items-center my-2"> -->
								<!-- <div class="col-md text-break h2"> -->
							<div class="my-2 text-break h2">
								<p class="text-body m-0 title-value"><?php echo $todo->title; ?></p>
							</div>
							<div class="overflow-hidden text-break text-black-50 p-2 memo">
								<p class="m-0 memo-value"><?php
								$view_memo = str_replace("\n", "<br>", $todo->memo);
								echo $view_memo; ?></p>
							</div>
							<div class="progress mt-3">
								<div class="progress-bar progress-value" role="progressbar" data-progress="<?php echo $todo->progress; ?>" style="width: <?php echo $todo->progress; ?>%;" aria-valuenow="<?php echo $todo->progress; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $todo->progress; ?>％</div>
							</div>
							<!-- </h2> -->
						</div>
					</li>
					<?php endforeach; ?>
				</ul>
			</main>


		<?php
	}
		?>
