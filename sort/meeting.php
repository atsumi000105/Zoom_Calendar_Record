<?php

$line_id = $event['source']['userId'];
require_once('../common/db_connect.php');
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();

$sql = 'SELECT id, meeting_flag, meeting_time, zoom_url, line_id FROM meetings WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_user['id']]);
$meeting = $select->fetch();
if ($meeting['meeting_flag'] == 2 && $meeting['zoom_url']) {
	$rep = $meeting['meeting_time'];
	$rep .= "\nにzoomを予約しています";
	$rep .= $meeting['zoom_url'];
	$reply['messages'][0] = ['type' => 'text', 'text' => $rep];
} elseif ($meeting['meeting_flag'] == 2 && $meeting['zoom_url'] == NULL) {
	require_once('../zoom/index.php');
} elseif ($meeting['meeting_flag'] == 1 && $meeting['meeting_time']) {
	$rep = $meeting['meeting_time'];
	$rep .= "\nに予約しています";
	$rep .= "\nこちらが弊社の住所になります";
	$rep .= "\n" . 'https://goo.gl/maps/qbzE2pv2eapHJ2vC7';
	$reply['messages'][0] = ['type' => 'text', 'text' => $rep];
} else {
	require_once('../google_calendar/store_visit_register.php');
}
