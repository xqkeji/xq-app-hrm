<?php
return [
	'list_form',
	'row'=>[
		'class'=>'text-center',
	],
	[
		'ListId',
		[
			'import'=>'ListUsername',
			'text'=>'工号',
		],
		[
			'import'=>'ListName',
			'text'=>'姓名',
			'attr_style'=>'width:120px;',
		],
		'ListSex',
		'ListEducation',
		'ListMobile',
		'ListEmail',
		'ListPositionId',
		'ListDepartmentId',
		
		'ListSwitch',
		'ListCreateTime',
		'ListEditDelete',
	]
];
