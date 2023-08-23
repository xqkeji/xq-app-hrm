<?php

return [
	'form',
	[
		'template'=>'row',
		'attr_class'=>'form-control',
		'attr_readonly'=>'true',
		[
			'import'=>'Username',
			'text'=>'工号',
		],
		[
			'import'=>'Name',
			'text'=>'姓名',
		],
		'IdCard',
		[
			'import'=>'Sex',
			'attr_disabled'=>'true',
		],
		[
			'import'=>'Education',
			'attr_disabled'=>'true',
		],
		
		'Email',
		'Mobile',
		'Address',
		[
			'import'=>'PositionId',
			'attr_disabled'=>'true',
		],
		[
			'import'=>'DepartmentId',
			'attr_disabled'=>'true',
		],
		
	],
	'foot'=>'',
];

