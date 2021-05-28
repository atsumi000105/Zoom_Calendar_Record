<?php
$line_id = $event['source']['userId'];
require_once('../common/db_connect.php');
$sql = 'select `id`, `line_id` from `line_users` where `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();

$sql = 'select id, line_id, meeting_flag from `meetings` where `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_user['id']]);
$meeting = $select->fetch();
if ($meeting['meeting_flag']) {
	$sql = 'UPDATE meetings SET meeting_flag = ? WHERE line_id = ?';
	$stmt = $dbh->prepare($sql);
	$delete = $stmt->execute(array(NULL, $line_user['id']));
}
$reply['messages'][0]['text'] = 'またのご利用お待ちしてます！';
?>
