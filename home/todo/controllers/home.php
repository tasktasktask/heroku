<?php
namespace controller\home;

use libs\Auth;

function get() {
	if (Auth::isLogin()) {
		\views\home\index();
	} else {
		redirect('login');
	}
}
