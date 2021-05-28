<?php
	$message = array(
		'type' => 'template',
		'altText' => '予約を確認',
		'template' => array(
			'type' => 'confirm',
			'text' => '予約を変更、または取り消すことができます',
			'actions' => array(
				array(
					'type' => 'message',
					'label' => '予約の確認',
					'text' => '予約の確認'
				), array(
					'type' => 'message',
					'label' => '予約を取消す',
					'text' => '予約を取消す'
				)
			)
		)
	);
	$reply['messages'][0] = $message;
?>
