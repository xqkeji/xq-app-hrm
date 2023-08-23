<?php
return [
	'select',
	'name'=>'attend_type',
	'text'=>'类型',
	'attr_required'=>'true',
	'attr_class'=>'form-select',
	'validators'=>[['required']],
	'items'=>[
        1=>'上班','下班'
    ],
    'event'=>[
		'beforeRender'=>function($element){
			$hour=date('H');
            if(($hour>12&&$hour<13)||($hour>18))
            {
                $element->setAttr('value',2);
            }
            else
            {
                $element->setAttr('value',1);
            }
			
		},
	],	
];