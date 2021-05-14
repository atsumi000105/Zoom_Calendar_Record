<?php
$str = $message['text'];
$target = array('第二希望は', 'です');
$second_select_condition = str_replace($target, '', $str);
$line_id = $event['source']['userId'];
require_once('../common/db_connect.php');
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();
$sql = 'UPDATE contact_forms SET second_select_condition = ? WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array($second_select_condition, $line_user['id']));
$content = [
	[
		'type' => 'text', 'text' => '必要な条件を1つ教えて下さい（第三希望)', 'size' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '特に希望はない', 'text' => '第三希望、必要な条件などの希望は特にない'
		],
		'height' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => 'バス・トイレ別', 'text' => '第三希望はバス・トイレ別です'
		],
		'height' => 'sm',
		'offsetBottom' => '10px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '2階以上', 'text' => '第三希望は2階以上です'
		],
		'height' => 'sm',
		'offsetBottom' => '20px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '駐車場付き', 'text' => '第三希望は駐車場付きです'
		],
		'height' => 'sm',
		'offsetBottom' => '30px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => 'ペット可', 'text' => '第三希望はペット可です'
		],
		'height' => 'sm',
		'offsetBottom' => '40px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => 'オートロック', 'text' => '第三希望はオートロックです'
		],
		'height' => 'sm',
		'offsetBottom' => '50px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => 'フローリング', 'text' => '第三希望はフローリングです'
		],
		'height' => 'sm',
		'offsetBottom' => '60px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => 'コンロ2口以上', 'text' => '第三希望はコンロ2口以上です'
		],
		'height' => 'sm',
		'offsetBottom' => '70px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '独立洗面所', 'text' => '第三希望は独立洗面所です'
		],
		'height' => 'sm',
		'offsetBottom' => '80px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '追い焚き機能', 'text' => '第三希望は追い焚き機能です'
		],
		'height' => 'sm',
		'offsetBottom' => '90px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '浴室乾燥機', 'text' => '第三希望は浴室乾燥機です'
		],
		'height' => 'sm',
		'offsetBottom' => '100px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '温水洗浄便座', 'text' => '第三希望は温水洗浄便座です'
		],
		'height' => 'sm',
		'offsetBottom' => '110px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => 'モニター付きインターホン', 'text' => '第三希望はモニター付きインターホンです'
		],
		'height' => 'sm',
		'offsetBottom' => '120px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '宅配ボックス', 'text' => '第三希望は宅配ボックスです'
		],
		'height' => 'sm',
		'offsetBottom' => '130px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => 'バイク置き場', 'text' => '第三希望はバイク置き場です'
		],
		'height' => 'sm',
		'offsetBottom' => '140px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => 'エレベーター', 'text' => '第三希望はエレベーターです'
		],
		'height' => 'sm',
		'offsetBottom' => '150px'
	],
];
$body = ['type' => 'box', 'layout' => 'vertical', 'height' => '540px', 'contents' => $content];
$contents = ['type' => 'bubble', 'body' => $body];
$reply['messages'][0] = ['type' => 'flex', 'altText' => 'This is a Flex Message', 'contents' => $contents];
?>
