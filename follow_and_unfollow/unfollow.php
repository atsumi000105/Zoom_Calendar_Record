<?php
require_once('../common/db_connect.php');
$line_id = $event['source']['userId'];
$sql = 'SELECT `id` FROM `line_users` WHERE `line_id` = ?';
$stmt = $dbh->prepare($sql);
$stmt->execute([$line_id]);
$id = $stmt->fetch();

if ($id) {
	$updated_at = date('Y-m-d H:i:s');
	$sql = 'UPDATE `line_users` SET `deleted_at` = ? WHERE `line_id` = ?';
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$updated_at, $line_id]);
}
?>
