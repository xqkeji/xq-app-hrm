<?php

return [
	'form',
	[
		'template'=>'row',
		'attr_class'=>'form-control',
		'EmployeeId',
		'WagesMonth',
		'BaseWages',
		[
			'import'=>'BaseWages',
			'name'=>'attend_wages',
			'text'=>'出勤'
		],
		[
			'import'=>'BaseWages',
			'name'=>'performance_wages',
			'text'=>'绩效'
		],
		[
			'import'=>'BaseWages',
			'name'=>'other_wages',
			'text'=>'其他工资'
		],
		[
			'import'=>'Desc',
			'text'=>'备注',
		],
		'Csrf',
	],
		
];

