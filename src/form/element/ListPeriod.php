<?php
return [
	'ListItem',
	'name'=>'period',
	'text'=>'时段',
	'attr_style'=>'width:120px;',
	'event'=>[
		'format'=>function($element,$value){
			$items=[
                1=>'上午','下午'
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