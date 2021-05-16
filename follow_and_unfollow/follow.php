<?php
require_once('../common/db_connect.php');
$line_id = $event['source']['userId'];
$sql = 'SELECT `id` FROM `line_users` WHERE `line_id` = ?';
$stmt = $dbh->prepare($sql);
$stmt->execute([$line_id]);
$id = $stmt->fetch();

if (!$id) {
	$created_at = $updated_at = date('Y-m-d H:i:s');
	$sql = 'INSERT INTO `line_users` (`line_id`, `created_at`, `updated_at`) VALUES (?, ?, ?)';
	$insert = $dbh->prepare($sql);
	$insert->execute([$line_id, $created_at, $updated_at]);

	$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
	$select = $dbh->prepare($sql);
	$select->execute([$line_id]);
	$line_user = $select->fetch();

	$sql = 'INSERT INTO `contact_forms` (`line_id`, `created_at`) VALUES (?, ?)';
	$insert = $dbh->prepare($sql);
	$insert->execute([$line_user['id'], $created_at]);

	require_once('../google_calendar/line_bot_register.php');
	require_once('../slack/line_bot_register.php');

} else {
	$updated_at = date('Y-m-d H:i:s');
	$sql = 'UPDATE `line_users` SET `updated_at` = ?, `deleted_at` = NULL WHERE `line_id` = ?';
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$updated_at, $line_id]);
}
?>
