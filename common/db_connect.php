<?php
require_once('../secret/password.php');
$dsn = 'mysql:host=localhost; dbname=procir_chinen339';
$username = $password['username'];
$password = $password['password'];
try {
		$dbh = new PDO ($dsn, $username, $password);
} catch (PDOException $e) {
		echo '接続失敗' . $e->getMessage();
		exit();
}

?>
