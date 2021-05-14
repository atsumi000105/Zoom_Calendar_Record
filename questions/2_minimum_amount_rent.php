<?php
$str = $message['text'];
$maximum_amount = str_replace('万円以内', '', $str);
$line_id = $event['source']['userId'];
require_once('../common/db_connect.php');
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();
$sql = 'UPDATE contact_forms SET maximum_amount = ? WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array($maximum_amount, $line_user['id']));

$content = [
	[
		'type' => 'text', 'text' => '賃料の最低金額を教えてください', 'size' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '3万円以上', 'text' => '3万円以上'
		],
		'height' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '4万円以上', 'text' => '4万円以上'
		],
		'height' => 'sm',
		'offsetBottom' => '10px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '5万円以上', 'text' => '5万円以上'
		],
		'height' => 'sm',
		'offsetBottom' => '20px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '6万円以上', 'text' => '6万円以上'
		],
		'height' => 'sm',
		'offsetBottom' => '30px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '7万円以上', 'text' => '7万円以上'
		],
		'height' => 'sm',
		'offsetBottom' => '40px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '8万円以上', 'text' => '8万円以上'
		],
		'height' => 'sm',
		'offsetBottom' => '50px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '9万円以上', 'text' => '9万円以上'
		],
		'height' => 'sm',
		'offsetBottom' => '60px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '10万円以上', 'text' => '10万円以上'
		],
		'height' => 'sm',
		'offsetBottom' => '70px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '12万円以上', 'text' => '12万円以上'
		],
		'height' => 'sm',
		'offsetBottom' => '80px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '14万円以上', 'text' => '14万円以上'
		],
		'height' => 'sm',
		'offsetBottom' => '90px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '16万円以上', 'text' => '16万円以上'
		],
		'height' => 'sm',
		'offsetBottom' => '100px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '18万円以上', 'text' => '18万円以上'
		],
		'height' => 'sm',
		'offsetBottom' => '110px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '20万円以上', 'text' => '20万円以上'
		],
		'height' => 'sm',
		'offsetBottom' => '120px'
	]
];
$body = ['type' => 'box', 'layout' => 'vertical', 'height' => '440px', 'contents' => $content];
$contents = ['type' => 'bubble', 'body' => $body];
$reply['messages'][0] = ['type' => 'flex', 'altText' => 'This is a Flex Message', 'contents' => $contents];
?>
