<?php
require __DIR__ . '/vendor/autoload.php';
require_once('../secret/password.php');
use \Firebase\JWT\JWT;
$token = array(
	"iss" => $zoom_api_key,
	"exp" => time() + 3600 //60 seconds as suggested
);
$encode = JWT::encode( $token, $zoom_api_secret );

$data_to_zoom_api = array(
"topic" => "zoom来客",
"type" => "2",
"start_time" => $event['postback']['params']['datetime'],
"timezone" => "Asia/Tokyo",
"settings" => array(
"use_pmi" => "false"
)
);
$options = array(
	'http' => array(
		'method'=> 'POST',
		'header'=> array(
			'Content-type: application/json',
			'Authorization: Bearer ' . $encode,
		),
		'content' => json_encode($data_to_zoom_api)
	)
);
$context = stream_context_create($options);
$json_result = file_get_contents($zoom_url, false, $context);
$json_result = json_decode($json_result, true);
$original_date = $event['postback']['params']['datetime'];
$timestamp = strtotime($original_date);
$new_date = date("Y年n月j日G時i分", $timestamp );
require_once('../google_calendar/zoom_register.php');
require_once('../slack/interview.php');

$message = '[' . $new_date . ']';
$message .= "\nにzoomの予約をしました。";
$message .= "\n" . $json_result['join_url'];
$reply['messages'][0] = ['type' => 'text', 'text' => $message];
