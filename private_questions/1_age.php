<?php
require_once('../common/db_connect.php');
$line_id = $event['source']['userId'];

$sql = 'SELECT `id` FROM `line_users` WHERE `line_id` = ?';
$stmt = $dbh->prepare($sql);
$stmt->execute([$line_id]);
$line_user = $stmt->fetch();
$created_at = $updated_at = date('Y-m-d H:i:s');

$sql = 'SELECT `id` FROM `personal_details` WHERE `line_id` = ?';
$stmt = $dbh->prepare($sql);
$stmt->execute([$line_user['id']]);
$personal_detail = $stmt->fetch();

if (!$personal_detail) {
	$sql = 'INSERT INTO `personal_details` (`line_id`, `created_at`) VALUES (?, ?)';
	$insert = $dbh->prepare($sql);
	$insert->execute([$line_user['id'], $created_at]);
}

$content = [
	[
		'type' => 'text', 'text' => 'あなたの年代を選択してください'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '20代', 'text' => '20代'
		],
		'height' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '30代', 'text' => '30代'
		],
		'height' => 'sm',
		'offsetBottom' => '10px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '40代', 'text' => '40代'
		],
		'height' => 'sm',
		'offsetBottom' => '20px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '50代', 'text' => '50代'
		],
		'height' => 'sm',
		'offsetBottom' => '30px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '60代以上', 'text' => '60代以上'
		],
		'height' => 'sm',
		'offsetBottom' => '40px'
	]
];
$body = ['type' => 'box', 'layout' => 'vertical', 'height' => '200px', 'contents' => $content];
$contents = ['type' => 'bubble', 'body' => $body];
$reply['messages'][0] = ['type' => 'flex', 'altText' => 'This is a Flex Message', 'contents' => $contents];
?>
