<?php
$content = [
	[
		'type' => 'text', 'text' => '賃料の上限金額を教えてください', 'size' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '3万円以内', 'text' => '3万円以内'
		],
		'height' => 'sm'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '4万円以内', 'text' => '4万円以内'
		],
		'height' => 'sm',
		'offsetBottom' => '10px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '5万円以内', 'text' => '5万円以内'
		],
		'height' => 'sm',
		'offsetBottom' => '20px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '6万円以内', 'text' => '6万円以内'
		],
		'height' => 'sm',
		'offsetBottom' => '30px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '7万円以内', 'text' => '7万円以内'
		],
		'height' => 'sm',
		'offsetBottom' => '40px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '8万円以内', 'text' => '8万円以内'
		],
		'height' => 'sm',
		'offsetBottom' => '50px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '9万円以内', 'text' => '9万円以内'
		],
		'height' => 'sm',
		'offsetBottom' => '60px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '10万円以内', 'text' => '10万円以内'
		],
		'height' => 'sm',
		'offsetBottom' => '70px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '12万円以内', 'text' => '12万円以内'
		],
		'height' => 'sm',
		'offsetBottom' => '80px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '14万円以内', 'text' => '14万円以内'
		],
		'height' => 'sm',
		'offsetBottom' => '90px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '16万円以内', 'text' => '16万円以内'
		],
		'height' => 'sm',
		'offsetBottom' => '100px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '18万円以内', 'text' => '18万円以内'
		],
		'height' => 'sm',
		'offsetBottom' => '110px'
	],
	[
		'type' => 'button', 'action' => [
			'type' => 'message', 'label' => '20万円以内', 'text' => '20万円以内'
		],
		'height' => 'sm',
		'offsetBottom' => '120px'
	]
];
$body = ['type' => 'box', 'layout' => 'vertical', 'height' => '440px', 'contents' => $content];
$contents = ['type' => 'bubble', 'body' => $body];
$reply['messages'][0] = ['type' => 'flex', 'altText' => 'This is a Flex Message', 'contents' => $contents];
?>
