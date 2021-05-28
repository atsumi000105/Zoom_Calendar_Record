<?php
require_once('../common/db_connect.php');
$line_id = $event['source']['userId'];
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();

$sql = 'SELECT id, meeting_flag, meeting_time, zoom_url, line_id FROM meetings WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_user['id']]);
$meeting = $select->fetch();
$meeting_time = date('Y年n月j日G時i分', strtotime($meeting['meeting_time']));
if ($meeting['meeting_flag']) {
	if ('予約を取消す' == $message['text']) {
		$rep = $meeting_time . 'に予定されていた';
		if ($meeting['meeting_flag'] == 1) {
			$rep .= "面談時間をキャンセルしました";
		}
		if ($meeting['meeting_flag'] == 2) {
			$rep .= "zoom面談をキャンセルしました";
		}
		$rep .= "\nもう一度予約したい場合は、";
		$rep .= "\n「来店予約」から予約が可能です";
		$reply['messages'][0]['text'] = $rep;
		require_once('../google_calendar/zoom_booking_time_delete.php');
	} else {
		if ($meeting['meeting_flag'] == 1) {
			$rep = $meeting_time;
			$rep .= "\nに予約しています";
			$rep .= "\nこちらが弊社の住所になります";
			$rep .= "\n" . 'https://goo.gl/maps/qbzE2pv2eapHJ2vC7';
			$rep .= "\n当日は気をつけてお越しください！";
			$reply['messages'][0]['text'] = $rep;
		} else {
			$rep = $meeting_time;
			$rep .= "\nにzoomを予約しています";
			$rep .= $meeting['zoom_url'];
			$reply['messages'][0]['text'] = $rep;
		}
	}
} else {
	$reply['messages'][0]['text'] = 'まだ予約をしていません';
}
?>
