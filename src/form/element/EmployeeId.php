<?php
return [
    'select_picker',
    'name'=>'employee_id',
    'text'=>'员工',
	'event'=>[
		'beforeRender'=>function($element){
			$model=\xqkeji\mvc\builder\Model::getModel('employee');
			$type=$model->where('status',1)->select();
			$items=$type->all();
			$rows=[];
			if(!empty($items))
			{
				foreach($items as $item)
				{
					$key=(string)$item->getKey();
					$val=$item->getAttr('name');
					$rows[$key]=$val;
				}
			}
			$element->setItems($rows);

			
		},
	],	
];
