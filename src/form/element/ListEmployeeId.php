<?php
return [
	'ListItem',
	'name'=>'employee_id',
	'text'=>'员工',
	'attr_style'=>'width:100px;',
	'event'=>[
		'format'=>function($element,$value){
			$model=\xqkeji\mvc\builder\Model::getModel('employee');
			$type=$model->find($value);
			if($type)
			{
				$name=$type->getAttr('name');
				return $name;
			}
			else
			{
				return '';
			}
		},
	],	
];