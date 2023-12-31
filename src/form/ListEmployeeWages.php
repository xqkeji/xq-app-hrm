<?php
return [
	'list_form',
	'row'=>[
		'class'=>'text-center',
	],
	[
		'ListEmployeeId',
		[
			'import'=>'ListName',
			'text'=>'工资月份',
			'name'=>'wages_month',
			'attr_style'=>'width:100px;',
		],
		'ListBaseWages',
		[
			'import'=>'ListBaseWages',
			'text'=>'出勤',
			'name'=>'attend_wages',
		],
		[
			'import'=>'ListBaseWages',
			'text'=>'绩效工资',
			'name'=>'performance_wages',
		],
		[
			'import'=>'ListBaseWages',
			'text'=>'其他工资',
			'name'=>'other_wages',
		],
		[
			'import'=>'ListBaseWages',
			'text'=>'工资总数',
			'name'=>'other_wages',
		],
		[
			'import'=>'ListDesc',
			'text'=>'备注'
		],
		'ListCreateTime'
	],
	'foot'=>'',
];
