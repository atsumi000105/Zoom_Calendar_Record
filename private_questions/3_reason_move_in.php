<?php
$job = $message['text'];
$line_id = $event['source']['userId'];
require_once('../common/db_connect.php');
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();
$sql = 'UPDATE personal_details SET job = ? WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array($job, $line_user['id']));

$content = [
	[
		'type' => 'text', 'text' => '引っ越しの理由を教えてください', 'size' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '転職・転勤', 'text' => '転職・転勤'
		],
		'height' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '就職', 'text' => '就職'
		],
		'height' => 'sm',
		'offsetBottom' => '10px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '進学', 'text' => '進学'
		],
		'height' => 'sm',
		'offsetBottom' => '20px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '更新がきたタイミングに合わせて', 'text' => '更新がきたタイミングに合わせて'
		],
		'height' => 'sm',
		'offsetBottom' => '30px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '今のお部屋に不満', 'text' => '今のお部屋に不満'
		],
		'height' => 'sm',
		'offsetBottom' => '40px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => 'その他', 'text' => 'その他'
		],
		'height' => 'sm',
		'offsetBottom' => '50px'
	]
];
$body = ['type' => 'box', 'layout' => 'vertical', 'height' => '240px', 'contents' => $content];
$contents = ['type' => 'bubble', 'body' => $body];
$reply['messages'][0] = ['type' => 'flex', 'altText' => 'This is a Flex Message', 'contents' => $contents];
?>

