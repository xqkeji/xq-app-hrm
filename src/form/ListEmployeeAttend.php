<?php
return [
	'list_form',
	'row'=>[
		'class'=>'text-center',
	],
	[
		'ListId',
		'ListEmployeeId',
		'ListPeriod',
		'ListAttendType',
		[
			'import'=>'ListName',
			'name'=>'attend_result',
			'text'=>'签到结果',
			'attr_style'=>'width:160px',
		],
		'ListDesc',
		'ListCreateTime',
		'ListDelete',
	],
];
