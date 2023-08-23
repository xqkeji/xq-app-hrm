<?php
return [
	'number',
	'name'=>'base_wages',
	'text'=>'基本工资',
	'attr_required'=>'true',
    'attr_style'=>'width:120px;',
    'validators'=>[['required']],
    'filters'=>['float'],
    'defaultValue'=>0,
];