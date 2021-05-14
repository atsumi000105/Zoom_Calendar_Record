<?php
$age_of_building = $message['text'];
$line_id = $event['source']['userId'];
require_once('../common/db_connect.php');
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();
$sql = 'UPDATE contact_forms SET age_of_building = ? WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array($age_of_building, $line_user['id']));
$content = [
	[
		'type' => 'text', 'text' => '最寄駅から徒歩何分をご希望でしょうか', 'size' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '特に希望はない', 'text' => '徒歩何分など特に希望はない'
		],
		'height' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '1分以内', 'text' => '1分以内'
		],
		'height' => 'sm',
		'offsetBottom' => '10px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '3分以内', 'text' => '3文以内'
		],
		'height' => 'sm',
		'offsetBottom' => '20px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '5分以内', 'text' => '5分以内'
		],
		'height' => 'sm',
		'offsetBottom' => '30px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '7分以内', 'text' => '7分以内'
		],
		'height' => 'sm',
		'offsetBottom' => '40px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '10分以内', 'text' => '10分以内'
		],
		'height' => 'sm',
		'offsetBottom' => '50px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '15分以内', 'text' => '15分以内'
		],
		'height' => 'sm',
		'offsetBottom' => '60px'
	],
];
$body = ['type' => 'box', 'layout' => 'vertical', 'height' => '260px', 'contents' => $content];
$contents = ['type' => 'bubble', 'body' => $body];
$reply['messages'][0] = ['type' => 'flex', 'altText' => 'This is a Flex Message', 'contents' => $contents];
?>
