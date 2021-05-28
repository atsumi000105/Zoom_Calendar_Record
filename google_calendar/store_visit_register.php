<?php
function insertDate($calendar_id, $meeting_time) {
	$start_time = new DateTime($meeting_time);
	$end_time = new DateTime(date('Y/m/d H:i:s', strtotime($meeting_time . "+140 seconds")));

	// composerでインストールしたライブラリを読み込む
	require_once __DIR__.'/vendor/autoload.php';

	// サービスアカウント作成時にダウンロードしたjsonファイル
	$aimJsonPath = __DIR__ . '/antaku-8b1ec191f032.json';

	// サービスオブジェクトを作成
	$client = new Google_Client();

	// このアプリケーション名
	$client->setApplicationName('カレンダー操作テスト イベントの取得');

	// ※ 注意ポイント: 権限の指定
	// 予定を取得する時は Google_Service_Calendar::CALENDAR_READONLY
	// 予定を追加する時は Google_Service_Calendar::CALENDAR_EVENTS
	$client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);

	// ユーザーアカウントのjsonを指定
	$client->setAuthConfig($aimJsonPath);

	// サービスオブジェクトの用意
	$service = new Google_Service_Calendar($client);

	$event = new Google_Service_Calendar_Event(array(
		'summary' => '来店希望', //予定のタイトル
		'start' => array(
			'dateTime' => $start_time->format(DateTime::ATOM),// 開始日時
			'timeZone' => 'Asia/Tokyo',
		),
		'end' => array(
			'dateTime' => $end_time->format(DateTime::ATOM),// 開始日時
			'timeZone' => 'Asia/Tokyo',
		),
	));
	$event = $service->events->insert($calendar_id, $event);
	return $event;
}
require_once('../secret/password.php');
require_once('../common/db_connect.php');
require_once('../slack/interview.php');
$line_id = $event['source']['userId'];
$original_date = $event['postback']['params']['datetime'];
$timestamp = strtotime($original_date);
$meeting_time = date("Y-m-d H:i:s", $timestamp );
$event = insertDate($calendar_id, $meeting_time);

$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();

$sql = 'UPDATE meetings SET event_id = ?, meeting_time = ? WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array($event['id'],  $meeting_time, $line_user['id']));

$sql = 'SELECT id, meeting_time, line_id FROM meetings WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_user['id']]);
$meeting = $select->fetch();
$meeting_time = date('Y年n月j日G時i分', strtotime($meeting['meeting_time']));

$rep = $meeting_time;
$rep .= "\nに予約しました！";
$rep .= "\nこちらが弊社の住所になります";
$rep .= "\n" . 'https://goo.gl/maps/qbzE2pv2eapHJ2vC7';

$reply['messages'][0] = ['type' => 'text', 'text' => $rep];
?>
