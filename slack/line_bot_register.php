<?php
require_once('../secret/password.php');
$headers = [
	"Authorization: Bearer $slack_line_bot_register", //（1)
	'Content-Type: application/json;charset=utf-8'
];

$url = "https://slack.com/api/chat.postMessage"; //(2)

//(3)
$post_fields = [
	"channel" => "ライン新規登録",
	"text" => "ラインボットにお客さんが登録しました。\n対応をお願いします！\n",
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
