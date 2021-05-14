<?php
$str = $message['text'];
$minimum_amount = str_replace('万円以上', '', $str);
$line_id = $event['source']['userId'];
require_once('../common/db_connect.php');
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();
$sql = 'UPDATE contact_forms SET minimum_amount = ? WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array($minimum_amount, $line_user['id']));
$content = [
	[
		'type' => 'text', 'text' => '第一希望の間取りを教えて下さい', 'size' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '1R  1K', 'text' => '第一希望は1R 1Kです'
		],
		'height' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '1DK  1LDK', 'text' => '第一希望は1DK 1LDKです'
		],
		'height' => 'sm',
		'offsetBottom' => '10px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '2K  2DK  2LDK', 'text' => '第一希望は2K 2DK 2LDKです'
		],
		'height' => 'sm',
		'offsetBottom' => '20px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '3K  3DK  3LDK', 'text' => '第一希望は3K 3DK 3LDKです'
		],
		'height' => 'sm',
		'offsetBottom' => '30px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '4K  4DK  4LDK', 'text' => '第一希望は4K 4DK 4LDKです'
		],
		'height' => 'sm',
		'offsetBottom' => '40px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '5K', 'text' => '第一希望は5K以上です'
		],
		'height' => 'sm',
		'offsetBottom' => '50px'
	]
];
$body = ['type' => 'box', 'layout' => 'vertical', 'height' => '230px', 'contents' => $content];
$contents = ['type' => 'bubble', 'body' => $body];
$reply['messages'][0] = ['type' => 'flex', 'altText' => 'This is a Flex Message', 'contents' => $contents];
?>
