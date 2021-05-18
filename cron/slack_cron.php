<?php
$dsn = 'mysql:host=localhost; dbname=xxxxxx';
$username = 'xxxxxxx';
$password = 'xxxxxxx';
try {
		$dbh = new PDO ($dsn, $username, $password);
} catch (PDOException $e) {
		echo '接続失敗' . $e->getMessage();
		exit();
}
$sql = 'SELECT count(line_users.id) FROM contact_forms INNER JOIN line_users ON line_users.id = contact_forms.line_id WHERE date(curdate() - interval 1 day) = date(line_users.created_at)';
$select = $dbh->query($sql);
$select->execute();
$line_user = $select->fetch();

$headers = [
	"Authorization: Bearer xxxxxxxxxxxxxxxxx", //（1)
	'Content-Type: application/json;charset=utf-8'
];

$url = "https://slack.com/api/chat.postMessage"; //(2)

//(3)
$post_fields = [
	"channel" => "ライン友達追加人数-バッチ処理",
	"text" => "本日は" . $line_user['count(line_users.id)'] . "名のお客様がラインボットに登録しました",
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
