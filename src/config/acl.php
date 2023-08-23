<?php
return [
	//授权入口类别（后台管理）
	'admin'=>[
		
		//只有得到授权并登录后才有访问权限
		'auth'=>[
			'department'=>['admin','add','edit','delete','change','b_delete'],
			'position'=>['admin','add','edit','delete','change','b_delete'],
			'employee'=>['admin','add','edit','delete','change','b_delete'],
			'attend'=>['admin','add','edit','delete','change','b_delete'],
			'wages'=>['admin','add','edit','delete','change','b_delete'],
			'notice'=>['admin','add','edit','delete','change','b_delete'],
		],
		
	],
	'employee'=>[
		'login'=>[
			'employee'=>[
				'index','info','logout','change_password','notice','view_notice','wages'
			],
			'employee_attend'=>['admin','add','delete','b_delete'],
		],
	],
	'guest'=>[
		'employee'=>['login','captcha'],
	],
];