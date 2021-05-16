<?php
require_once('../secret/password.php');
$headers = [
	"Authorization: Bearer $slack_line_bot_private_questions_answer", //（1)
	'Content-Type: application/json;charset=utf-8'
];

$url = "https://slack.com/api/chat.postMessage"; //(2)

$post_fields = [
	"channel" => "ライン個人情報全て回答",
	"text" => "お客様がラインボットの個人情報を全て回答しました。\n対応をお願いします！\n",
	"as_user" => true
];

$options = [
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HTTPHEADER => $headers,
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => json_encode($post_fields)
];

$ch = curl_init();

curl_setopt_array($ch, $options);

$result = curl_exec($ch);

curl_close($ch);
?>
