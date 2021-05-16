<?php
require_once('../secret/password.php');
// Talk API の URL
$url = 'https://api.a3rt.recruit-tech.co.jp/talk/v1/smalltalk';

// 第一引数を入力テキストにする
$query = $message['text'];

// リクエスト作成
$request = array(
	'apikey' => $talk_api_key,
	'query'  => $query
);

// ストリームコンテキストの作成
$opts['http'] = array(
	'method'    => 'POST',
	'header'    => 'Content-type: application/x-www-form-urlencoded;charset=UTF-8',
	'content'   => http_build_query($request, '', '&', PHP_QUERY_RFC3986)
);
$context = stream_context_create($opts);

// リクエスト実行
$response_json = file_get_contents($url, false, $context);

// JSON を 配列に変換
$response_arr = json_decode($response_json, true);

// 表示処理
$reply['messages'][0]['text'] = $response_arr['results'][0]['reply'];
