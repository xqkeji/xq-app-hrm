<?php
return [
	'ListItem',
	'name'=>'attend_type',
	'text'=>'类型',
	'attr_style'=>'width:120px;',
	'event'=>[
		'format'=>function($element,$value){
			$items=[
                1=>'上班','下班'
			];
			if(isset($items[$value]))
			{
				return $items[$value];
			}
			else
			{
				return '';
			}
		},
	],	
];