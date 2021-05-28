<?php
require_once('../common/db_connect.php');
require_once('../secret/password.php');
$line_id = $event['source']['userId'];
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();

$sql = 'SELECT id, event_id, line_id FROM meetings WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_user['id']]);
$meeting = $select->fetch();
if ($meeting['meeting_flag'] == 1) {
	$rep = $meeting['meeting_time'];
	$rep .= "\nに予約しています";
	$rep .= "\nこちらが弊社の住所になります";
	$rep .= "\n" . 'https://goo.gl/maps/qbzE2pv2eapHJ2vC7';
	$rep .= "\n当日は気をつけてお越しください！";
	$reply['messages'][0]['text'] = $rep;
} else {
	$rep = $meeting['meeting_time'];
	$rep .= "\nにzoomを予約しています";
	$rep .= $meeting['zoom_url'];
	$reply['messages'][0]['text'] = $rep;
}

?>
