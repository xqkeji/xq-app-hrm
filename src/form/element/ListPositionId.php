<?php
return [
	'ListItem',
	'name'=>'position_id',
	'text'=>'职位',
	'attr_style'=>'width:160px;',
	'event'=>[
		'format'=>function($element,$value){
			$model=\xqkeji\mvc\builder\Model::getModel('position');
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