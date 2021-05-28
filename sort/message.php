<?php
	switch ($message['text']) {
		case 'お部屋探しをスタート':
			require_once('../questions/1_maximum_amount_rent.php');
			break;
		case '3万円以内':
		case '4万円以内':
		case '5万円以内':
		case '6万円以内':
		case '7万円以内':
		case '8万円以内':
		case '9万円以内':
		case '10万円以内':
		case '12万円以内':
		case '14万円以内':
		case '16万円以内':
		case '18万円以内':
		case '20万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '3万円以上':
		case '4万円以上':
		case '5万円以上':
		case '6万円以上':
		case '7万円以上':
		case '8万円以上':
		case '9万円以上':
		case '10万円以上':
		case '12万円以上':
		case '14万円以上':
		case '16万円以上':
		case '18万円以上':
		case '20万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '第一希望は1R 1Kです':
		case '第一希望は1DK 1LDKです':
		case '第一希望は2K 2DK 2LDKです':
		case '第一希望は3K 3DK 3LDKです':
		case '第一希望は4K 4DK 4LDKです':
		case '第一希望は5K以上です':
			require_once('../questions/4_floor_plan_2.php');
			break;
		case '第二希望は1R 1Kです':
		case '第二希望は1DK 1LDKです':
		case '第二希望は2K 2DK 2LDKです':
		case '第二希望は3K 3DK 3LDKです':
		case '第二希望は4K 4DK 4LDKです':
		case '第二希望は5K以上です':
			require_once('../questions/5_age_of_building.php');
			break;
		case '築年数は特に希望はない':
		case '新築':
		case '3年以内':
		case '5年以内':
		case '10年以内':
		case '20年以内':
		case 'リノベーション物件':
			require_once('../questions/6_walking_distance_from_station.php');
			break;
		case '徒歩何分など特に希望はない':
		case '1分以内':
		case '3分以内':
		case '5分以内':
		case '7分以内':
		case '10分以内':
		case '15分以内':
			require_once('../questions/7_first_select_condition.php');
			break;
		case '第一希望はバス・トイレ別です':
		case '第一希望は2階以上です':
		case '第一希望は駐車場付きです':
		case '第一希望はペット可です':
		case '第一希望はオートロックです':
		case '第一希望はフローリングです':
		case '第一希望はコンロ2口以上です':
		case '第一希望は独立洗面所です':
		case '第一希望は追い焚き機能です':
		case '第一希望は浴室乾燥機です':
		case '第一希望は温水洗浄便座です':
		case '第一希望はモニター付きインターホンです':
		case '第一希望は宅配ボックスです':
		case '第一希望はバイク置き場です':
		case '第一希望はエレベーターです':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第二希望はバス・トイレ別です':
		case '第二希望は2階以上です':
		case '第二希望は駐車場付きです':
		case '第二希望はペット可です':
		case '第二希望はオートロックです':
		case '第二希望はフローリングです':
		case '第二希望はコンロ2口以上です':
		case '第二希望は独立洗面所です':
		case '第二希望は追い焚き機能です':
		case '第二希望は浴室乾燥機です':
		case '第二希望は温水洗浄便座です':
		case '第二希望はモニター付きインターホンです':
		case '第二希望は宅配ボックスです':
		case '第二希望はバイク置き場です':
		case '第二希望はエレベーターです':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第三希望はバス・トイレ別です':
		case '第三希望は2階以上です':
		case '第三希望は駐車場付きです':
		case '第三希望はペット可です':
		case '第三希望はオートロックです':
		case '第三希望はフローリングです':
		case '第三希望はコンロ2口以上です':
		case '第三希望は独立洗面所です':
		case '第三希望は追い焚き機能です':
		case '第三希望は浴室乾燥機です':
		case '第三希望は温水洗浄便座です':
		case '第三希望はモニター付きインターホンです':
		case '第三希望は宅配ボックスです':
		case '第三希望はバイク置き場です':
		case '第三希望はエレベーターです':
			require_once('../questions/10_local.php');
			break;
		case '個人情報入力':
			require_once('../private_questions/1_age.php');
			break;
		case '20代':
		case '30代':
		case '40代':
		case '50代':
		case '60代以上':
			require_once('../private_questions/2_job.php');
			break;
		case '会社員':
		case '公務員':
		case '個人事業主':
		case 'パート・アルバイト':
		case '大学・短大・専門生':
		case '生活保護受給':
		case '年金受給':
			require_once('../private_questions/3_reason_move_in.php');
			break;
		case '転職・転勤':
		case '就職':
		case '進学':
		case '更新がきたタイミングに合わせて':
		case '今のお部屋に不満':
		case 'その他':
			require_once('../private_questions/4_when_move_in.php');
			break;
		case 'できるだけ早く':
		case '1ヶ月以内':
		case '2ヶ月以内':
		case '物件情報が欲しい':
			require_once('../private_questions/5_question_finish.php');
			break;
		case '来店予約':
			require('../questions/12_visit.php');
			break;
		case '来店希望':
		case 'zoom面談':
			require('../questions/13_visit_time.php');
			break;
		case '予約確認':
			require_once('../questions/14_booking.php');
			break;
		case '予約の確認':
		case '予約を取消す':
			require_once('../booking_confirmation/index.php');
			break;
		case '予約しない':
			require_once('../questions/15_do_not_reserve.php');
			break;
		default:
			require_once('../talk/message.php');
			break;
	}
?>
