<?php
return [
	'admin'=>[
		//后台管理菜单
		'title'=>'人事管理',
		'children'=>[
			[
				'url'=>'department/admin',
				'title'=>'部门管理',
				'icon'=>'bi bi-diagram-3',
			],
			[
				'url'=>'position/admin',
				'title'=>'职位管理',
				'icon'=>'bi bi-hr',
			],
			[
				'url'=>'employee/admin',
				'title'=>'员工管理',
				'icon'=>'bi bi-person-workspace',
			],
			[
				'url'=>'attend/admin',
				'title'=>'考勤管理',
				'icon'=>'bi bi-journal-check',
			],
			[
				'url'=>'wages/admin',
				'title'=>'工资管理',
				'icon'=>'bi bi-wallet',
			],
			[
				'url'=>'notice/admin',
				'title'=>'公告管理',
				'icon'=>'bi bi-bell',
			],
		]
	]
	
	
	
];
