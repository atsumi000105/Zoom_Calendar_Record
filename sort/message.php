<?php
	switch ($message['text']) {
		case 'お部屋探しをスタート':
			require_once('../questions/1_maximum_amount_rent.php');
			break;
		case '3万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '4万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '5万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '6万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '7万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '8万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '9万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '10万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '12万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '14万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '16万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '18万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '20万円以内':
			require_once('../questions/2_minimum_amount_rent.php');
			break;
		case '3万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '4万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '5万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '6万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '7万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '8万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '9万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '10万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '12万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '14万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '16万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '18万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '20万円以上':
			require_once('../questions/3_floor_plan_1.php');
			break;
		case '第一希望は1R 1Kです':
			require_once('../questions/4_floor_plan_2.php');
			break;
		case '第一希望は1DK 1LDKです':
			require_once('../questions/4_floor_plan_2.php');
			break;
		case '第一希望は2K 2DK 2LDKです':
			require_once('../questions/4_floor_plan_2.php');
			break;
		case '第一希望は3K 3DK 3LDKです':
			require_once('../questions/4_floor_plan_2.php');
			break;
		case '第一希望は4K 4DK 4LDKです':
			require_once('../questions/4_floor_plan_2.php');
			break;
		case '第一希望は5K以上です':
			require_once('../questions/4_floor_plan_2.php');
			break;
		case '間取りの第二希望はなし':
			require_once('../questions/5_age_of_building.php');
			break;
		case '第二希望は1R 1Kです':
			require_once('../questions/5_age_of_building.php');
			break;
		case '第二希望は1DK 1LDKです':
			require_once('../questions/5_age_of_building.php');
			break;
		case '第二希望は2K 2DK 2LDKです':
			require_once('../questions/5_age_of_building.php');
			break;
		case '第二希望は3K 3DK 3LDKです':
			require_once('../questions/5_age_of_building.php');
			break;
		case '第二希望は4K 4DK 4LDKです':
			require_once('../questions/5_age_of_building.php');
			break;
		case '第二希望は5K以上です':
			require_once('../questions/5_age_of_building.php');
			break;
		case '築年数は特に希望はない':
			require_once('../questions/6_walking_distance_from_station.php');
			break;
		case '新築':
			require_once('../questions/6_walking_distance_from_station.php');
			break;
		case '3年以内':
			require_once('../questions/6_walking_distance_from_station.php');
			break;
		case '5年以内':
			require_once('../questions/6_walking_distance_from_station.php');
			break;
		case '10年以内':
			require_once('../questions/6_walking_distance_from_station.php');
			break;
		case '20年以内':
			require_once('../questions/6_walking_distance_from_station.php');
			break;
		case 'リノベーション物件':
			require_once('../questions/6_walking_distance_from_station.php');
			break;
		case '徒歩何分など特に希望はない':
			require_once('../questions/7_first_select_condition.php');
			break;
		case '1分以内':
			require_once('../questions/7_first_select_condition.php');
			break;
		case '3分以内':
			require_once('../questions/7_first_select_condition.php');
			break;
		case '5分以内':
			require_once('../questions/7_first_select_condition.php');
			break;
		case '7分以内':
			require_once('../questions/7_first_select_condition.php');
			break;
		case '10分以内':
			require_once('../questions/7_first_select_condition.php');
			break;
		case '15分以内':
			require_once('../questions/7_first_select_condition.php');
			break;
		case '第一希望はバス・トイレ別です':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望は2階以上です':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望は駐車場付きです':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望はペット可です':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望はオートロックです':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望はフローリングです':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望はコンロ2口以上です':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望は独立洗面所です':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望は追い焚き機能です':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望は浴室乾燥機です':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望は温水洗浄便座です':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望はモニター付きインターホンです':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望は宅配ボックスです':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望はバイク置き場です':
			require_once('../questions/8_second_select_condition.php');
			break;
		case '第一希望はエレベーターです':
			require_once('questions/8_second_select_condition.php');
			break;
		case '第二希望はバス・トイレ別です':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望は2階以上です':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望は駐車場付きです':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望はペット可です':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望はオートロックです':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望はフローリングです':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望はコンロ2口以上です':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望は独立洗面所です':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望は追い焚き機能です':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望は浴室乾燥機です':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望は温水洗浄便座です':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望はモニター付きインターホンです':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望は宅配ボックスです':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望はバイク置き場です':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第二希望はエレベーターです':
			require_once('../questions/9_third_select_condition.php');
			break;
		case '第三希望はバス・トイレ別です':
			require_once('../questions/10_local.php');
			break;
		case '第三希望は2階以上です':
			require_once('../questions/10_local.php');
			break;
		case '第三希望は駐車場付きです':
			require_once('../questions/10_local.php');
			break;
		case '第三希望はペット可です':
			require_once('../questions/10_local.php');
			break;
		case '第三希望はオートロックです':
			require_once('../questions/10_local.php');
			break;
		case '第三希望はフローリングです':
			require_once('../questions/10_local.php');
			break;
		case '第三希望はコンロ2口以上です':
			require_once('../questions/10_local.php');
			break;
		case '第三希望は独立洗面所です':
			require_once('../questions/10_local.php');
			break;
		case '第三希望は追い焚き機能です':
			require_once('../questions/10_local.php');
			break;
		case '第三希望は浴室乾燥機です':
			require_once('../questions/10_local.php');
			break;
		case '第三希望は温水洗浄便座です':
			require_once('../questions/10_local.php');
			break;
		case '第三希望はモニター付きインターホンです':
			require_once('../questions/10_local.php');
			break;
		case '第三希望は宅配ボックスです':
			require_once('../questions/10_local.php');
			break;
		case '第三希望はバイク置き場です':
			require_once('../questions/10_local.php');
			break;
		case '第三希望はエレベーターです':
			require_once('../questions/10_local.php');
			break;
		case '個人情報入力':
			require_once('../private_questions/1_age.php');
			break;
		case '20代':
			require_once('../private_questions/2_job.php');
			break;
		case '30代':
			require_once('../private_questions/2_job.php');
			break;
		case '40代':
			require_once('../private_questions/2_job.php');
			break;
		case '50代':
			require_once('../private_questions/2_job.php');
			break;
		case '60代以上':
			require_once('../private_questions/2_job.php');
			break;
		case '会社員':
			require_once('../private_questions/3_reason_move_in.php');
			break;
		case '公務員':
			require_once('../private_questions/3_reason_move_in.php');
			break;
		case '個人事業主':
			require_once('../private_questions/3_reason_move_in.php');
			break;
		case 'パート・アルバイト':
			require_once('../private_questions/3_reason_move_in.php');
			break;
		case '大学・短大・専門生':
			require_once('../private_questions/3_reason_move_in.php');
			break;
		case '生活保護受給':
			require_once('../private_questions/3_reason_move_in.php');
			break;
		case '年金受給':
			require_once('../private_questions/3_reason_move_in.php');
			break;
		case '転職・転勤':
			require_once('../private_questions/4_when_move_in.php');
			break;
		case '就職':
			require_once('../private_questions/4_when_move_in.php');
			break;
		case '進学':
			require_once('../private_questions/4_when_move_in.php');
			break;
		case '更新がきたタイミングに合わせて':
			require_once('../private_questions/4_when_move_in.php');
			break;
		case '今のお部屋に不満':
			require_once('../private_questions/4_when_move_in.php');
			break;
		case 'その他':
			require_once('../private_questions/4_when_move_in.php');
			break;
		case 'できるだけ早く':
			require_once('../private_questions/5_question_finish.php');
			break;
		case '1ヶ月以内':
			require_once('../private_questions/5_question_finish.php');
			break;
		case '2ヶ月以内':
			require_once('../private_questions/5_question_finish.php');
			break;
		case '物件情報が欲しい':
			require_once('../private_questions/5_question_finish.php');
			break;
		default:
			require_once('../talk/message.php');
			break;
	}
?>
