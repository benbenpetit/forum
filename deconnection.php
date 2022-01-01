<?php session_destroy();

if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]
	);
}
 
// Finalement, on détruit la session.
session_destroy();

header('Location: http://localhost:8888/sorbonne/PHP/forum/');

?>