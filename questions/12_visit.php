<?php
$line_id = $event['source']['userId'];
require_once('../common/db_connect.php');
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();

$sql = 'SELECT id, meeting_flag, line_id, zoom_url,  meeting_time FROM meetings WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_user['id']]);
$meeting = $select->fetch();
$meeting_time = date('Y年n月j日G時i分', strtotime($meeting['meeting_time']));

if ($meeting['meeting_flag'] && $meeting['meeting_time']) {
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
} else {
	$message = array(
		'type' => 'template',
		'altText' => '来店予約',
		'template' => array(
			'type' => 'confirm',
			'text' => 'zoomもしくは来店どちらにしますか？',
			'actions' => array(
				array(
					'type' => 'message',
					'label' => '来店希望',
					'text' => '来店希望'
				), array(
					'type' => 'message',
					'label' => 'zoom面談',
					'text' => 'zoom面談'
				)
			)
		)
	);
	$reply['messages'][0] = $message;
}
