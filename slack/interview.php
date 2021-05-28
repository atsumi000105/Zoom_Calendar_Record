<?php
require_once('../secret/password.php');
$headers = [
	"Authorization: Bearer $slack_zoom_chnanel_api_key", //（1)
	'Content-Type: application/json;charset=utf-8'
];

$url = "https://slack.com/api/chat.postMessage"; //(2)

//(3)
$post_fields = [
	"channel" => "面談",
	"text" => "面談が追加されました。\n確認をお願いします！\n",
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
