<?php
$str = $message['text'];
$target = array('第二希望は', 'です');
$floor_plan_2 = str_replace($target, '', $str);
$line_id = $event['source']['userId'];
require_once('../common/db_connect.php');
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();
$sql = 'UPDATE contact_forms SET floor_plan_2 = ? WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array($floor_plan_2, $line_user['id']));
$content = [
	[
		'type' => 'text', 'text' => '希望する建物の築年数を教えて下さい', 'size' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '新築', 'text' => '新築'
		],
		'height' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '3年以内', 'text' => '3年以内'
		],
		'height' => 'sm',
		'offsetBottom' => '10px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '5年以内', 'text' => '5年以内'
		],
		'height' => 'sm',
		'offsetBottom' => '20px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '10年以内', 'text' => '10年以内'
		],
		'height' => 'sm',
		'offsetBottom' => '30px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '20年以内', 'text' => '20年以内'
		],
		'height' => 'sm',
		'offsetBottom' => '40px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => 'リノベーション物件', 'text' => 'リノベーション物件'
		],
		'height' => 'sm',
		'offsetBottom' => '50px'
	],
];
$body = ['type' => 'box', 'layout' => 'vertical', 'height' => '230px', 'contents' => $content];
$contents = ['type' => 'bubble', 'body' => $body];
$reply['messages'][0] = ['type' => 'flex', 'altText' => 'This is a Flex Message', 'contents' => $contents];
?>
