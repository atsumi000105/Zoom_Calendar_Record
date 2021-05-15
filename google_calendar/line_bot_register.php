<?php
function insertDate($calendar_id) {
	$start_time = new DateTime(date("Y/m/d H:i:s"));
	$end_time = new DateTime(date('Y/m/d H:i:s', strtotime("now +140 seconds")));

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
		'summary' => 'ラインボットに登録', //予定のタイトル
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
}
require_once('../secret/password.php');
$insert_date = insertDate($calendar_id);
?>
