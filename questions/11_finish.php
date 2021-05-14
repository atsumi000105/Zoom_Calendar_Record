<?php
$line_id = $event['source']['userId'];
$address = $event['message']['address'];
$latitude = $event['message']['latitude'];
$longitude = $event['message']['longitude'];

require_once('../common/db_connect.php');
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();

$sql = 'UPDATE contact_forms SET address = ?, address_latitude = ?, address_longitude = ?, updated_at = NOW() WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array($address, $latitude, $longitude, $line_user['id']));

$rep = 'ご回答ありがとうございました！';
$rep .= 'ご希望に合うお部屋をお探しします。';
$rep .= 'ラインで返信しますので、しばらくお待ちください！';
$reply['messages'][0]['text'] = $rep;

$sql = 'SELECT `google_calender_send_line_bot_question_all_answer`, `slack_send_line_bot_answer_question` FROM `contact_form_details` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_user['id']]);
$contact_form_detail = $select->fetch();

if ($contact_form_detail['google_calender_send_line_bot_question_all_answer'] == 0 && $contact_form_detail['slack_send_line_bot_answer_question'] == 0) {
	require_once('google_calender/question_complete.php');
	require_once('slack/line_bot_question_answer.php');
}
?>
