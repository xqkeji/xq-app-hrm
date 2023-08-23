<?php
return [
	'select',
	'name'=>'period',
	'text'=>'时段',
	'attr_required'=>'true',
	'attr_class'=>'form-select',
	'validators'=>[['required']],
	'items'=>[
        1=>'上午','下午'
    ],
    'event'=>[
		'beforeRender'=>function($element){
			$hour=date('H');
            if($hour<12)
            {
                $element->setAttr('value',1);
            }
            else
            {
                $element->setAttr('value',2);
            }
			
		},
	],	
];