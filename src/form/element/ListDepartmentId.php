<?php
return [
	'ListItem',
	'name'=>'department_id',
	'text'=>'部门',
	'attr_style'=>'width:100px;',
	'event'=>[
		'format'=>function($element,$value){
			$model=\xqkeji\mvc\builder\Model::getModel('department');
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