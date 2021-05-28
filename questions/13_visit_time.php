
<?php
$line_id = $event['source']['userId'];
$created_at = date('Y-m-d H:i:s');
require_once('../common/db_connect.php');
$sql = 'select `id`, `line_id` from `line_users` where `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();

$sql = 'select id, line_id, meeting_flag from `meetings` where `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_user['id']]);
$row = $select->fetch();

if (!$row) {
	$sql = 'INSERT INTO `meetings` (`line_id`, `created_at`) VALUES (?, ?)';
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$line_user['id'], $created_at]);
}

if (!$row['meeting_flag']) {
	if ('来店希望' == $message['text']) {
		$sql = 'UPDATE meetings SET meeting_flag = ? WHERE line_id = ?';
		$stmt = $dbh->prepare($sql);
		$insert = $stmt->execute(array('1', $line_user['id']));
	}

	if ('zoom面談' == $message['text']) {
		$sql = 'UPDATE meetings SET meeting_flag = ? WHERE line_id = ?';
		$stmt = $dbh->prepare($sql);
		$insert = $stmt->execute(array('2', $line_user['id']));
	}
}


$message = array(
	'type' => 'template',
	'altText' => '日時予約',
	'template' => array(
		'type' => 'confirm',
		'text' => '面談可能な時間を指定してください',
		'actions' => array(
			array(
				'type' => 'datetimepicker',
				'label' => '期日を指定',
				'data' => 'datetemp',
				'mode' => 'datetime'
			), array(
				'type' => 'message',
				'label' => '予約しない',
				'text' => '予約しない'
			)
		)
	)
);
$reply['messages'][0] = $message;
