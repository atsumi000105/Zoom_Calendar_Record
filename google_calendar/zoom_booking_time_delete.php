<?php
function deleteDate($event_id, $calendar_id) {

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

	$event = $service->events->delete($calendar_id, $event_id);
	return $event;
}
require_once('../common/db_connect.php');
require_once('../secret/password.php');
$line_id = $event['source']['userId'];
$sql = 'SELECT `id`, `line_id` FROM `line_users` WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_id]);
$line_user = $select->fetch();

$sql = 'SELECT id, event_id, line_id FROM meetings WHERE `line_id` = ?';
$select = $dbh->prepare($sql);
$select->execute([$line_user['id']]);
$meeting = $select->fetch();
var_dump($meeting['event_id']);
$event_id = $meeting['event_id'];
$delete = deleteDate($event_id, $calendar_id);
$sql = 'UPDATE meetings SET meeting_flag = ?, event_id = ?, zoom_url = ?, meeting_time = ? WHERE line_id = ?';
$stmt = $dbh->prepare($sql);
$insert = $stmt->execute(array(NULL, NULL, NULL, NULL, $line_user['id']));
