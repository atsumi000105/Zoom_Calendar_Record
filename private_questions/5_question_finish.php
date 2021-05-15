<?php
$line_id = $event['source']['userId'];
$when_move_in = $message['text'];

require_once('../common/db_connect.php');
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();
$sql = 'UPDATE personal_details SET when_move_in = ? WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array($when_move_in, $line_user['id']));


$rep = 'ご回答ありがとうございました！';
$rep .= '担当者の方が来ますので少々お待ちください！';
$reply['messages'][0]['text'] = $rep;

$sql = 'SELECT `slack_send_linebot_answer_private_question` FROM `contact_form_details` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_user['id']]);
$contact_form_detail = $select->fetch();

if ($contact_form_detail['slack_send_linebot_answer_private_question'] == 0) {
	require_once('slack/line_bot_private_question_answer.php');
}
?>
