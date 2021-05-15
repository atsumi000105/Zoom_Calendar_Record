
<?php
$str = $message['text'];
$num = preg_replace('/[^0-9]/', '', $str);
$line_id = $event['source']['userId'];
require_once('../common/db_connect.php');
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();
$sql = 'UPDATE personal_details SET age = ? WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array($num, $line_user['id']));

$content = [
	[
		'type' => 'text', 'text' => 'あなたの職業を教えて下さい', 'size' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '会社員', 'text' => '会社員'
		],
		'height' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '公務員', 'text' => '公務員'
		],
		'height' => 'sm',
		'offsetBottom' => '10px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '個人事業主', 'text' => '個人事業主'
		],
		'height' => 'sm',
		'offsetBottom' => '20px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => 'パート・アルバイト', 'text' => 'パート・アルバイト'
		],
		'height' => 'sm',
		'offsetBottom' => '30px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '大学・短大・専門生', 'text' => '大学・短大・専門生'
		],
		'height' => 'sm',
		'offsetBottom' => '40px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '生活保護受給', 'text' => '生活保護受給'
		],
		'height' => 'sm',
		'offsetBottom' => '50px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '年金受給', 'text' => '年金受給'
		],
		'height' => 'sm',
		'offsetBottom' => '60px'
	],
];
$body = ['type' => 'box', 'layout' => 'vertical', 'height' => '270px', 'contents' => $content];
$contents = ['type' => 'bubble', 'body' => $body];
$reply['messages'][0] = ['type' => 'flex', 'altText' => 'This is a Flex Message', 'contents' => $contents];
?>
