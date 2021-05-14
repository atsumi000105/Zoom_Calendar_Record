<?php
$str = $message['text'];
$target = array('第三希望は', 'です');
$third_select_condition = str_replace($target, '', $str);
$line_id = $event['source']['userId'];
require_once('../common/db_connect.php');
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();
$sql = 'UPDATE contact_forms SET third_select_condition = ? WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array($third_select_condition, $line_user['id']));
$template = array('type' => 'buttons',
	'text'    => '住みたいを地域を教えて下さい',
	'actions' => array(
		array('type'=>'uri', 'label'=>'こちらをクリック', 'uri'=>'https://line.me/R/nv/location/' ),
	)
);

$message = array('type' => 'template',
	'altText'  => '検索したいエリア',
	'template' => $template
);
$reply['messages'][0] = $message;
?>
