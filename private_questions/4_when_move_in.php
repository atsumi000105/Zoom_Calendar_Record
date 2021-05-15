<?php
$reason_move_in = $message['text'];
$line_id = $event['source']['userId'];
require_once('../common/db_connect.php');

$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();

$sql = 'UPDATE personal_details SET reason_move_in = ? WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array($reason_move_in, $line_user['id']));

$content = [
	[
		'type' => 'text', 'text' => '引っ越し予定時期を教えて下さい', 'size' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => 'できるだけ早く', 'text' => 'できるだけ早く'
		],
		'height' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '1ヶ月以内', 'text' => '1ヶ月以内'
		],
		'height' => 'sm',
		'offsetBottom' => '10px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '2ヶ月以内', 'text' => '2ヶ月以内'
		],
		'height' => 'sm',
		'offsetBottom' => '20px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '物件情報が欲しい', 'text' => '物件情報が欲しい'
		],
		'height' => 'sm',
		'offsetBottom' => '30px'
	]
];
$body = ['type' => 'box', 'layout' => 'vertical', 'height' => '180px', 'contents' => $content];
$contents = ['type' => 'bubble', 'body' => $body];
$reply['messages'][0] = ['type' => 'flex', 'altText' => 'This is a Flex Message', 'contents' => $contents];
?>
