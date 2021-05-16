<?php
require_once('./LINEBotTiny.php');
require_once('../secret/password.php');
$client = new LINEBotTiny($password['channel_access_token'], $password['channel_secret']);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
		case 'follow':
			require_once('../follow_and_unfollow/follow.php');
			break;
		case 'unfollow':
			require_once('../follow_and_unfollow/unfollow.php');
			break;
		case 'message':
			$message = $event['message'];
			switch ($message['type']) {
				case 'text':
					$reply['replyToken'] = $event['replyToken'];
					$reply['messages'][] = ['type' => 'text', 'text' => $message['text']];
					require_once('../sort/message.php');
					$client->replyMessage($reply);
					break;
				case 'location':
					$reply['replyToken'] = $event['replyToken'];
					$reply['messages'][] = ['type' => 'text', 'text' => $message['text']];
					require_once('../questions/11_finish.php');
					$client->replyMessage($reply);
					break;
				default:
					error_log('Unsupported message type: ' . $message['type']);
					break;
			}
			break;
		default:
			error_log('Unsupported event type: ' . $event['type']);
			break;
	}
};
