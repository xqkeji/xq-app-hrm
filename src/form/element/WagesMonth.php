<?php
return [
	'text',
	'name'=>'wages_month',
	'text'=>'工资月份',
	'attr_required'=>'true',
	'validators'=>[
		['required']
	],
    'event'=>[
		'beforeRender'=>function($element){
            $controller=\xqkeji\App::getController();
			$actionName=$controller->getActionName();
			if($actionName=='add')
			{
                $date=date('Y-m');
                $element->setAttr('value',$date);
            }
			
		},
	],	
];