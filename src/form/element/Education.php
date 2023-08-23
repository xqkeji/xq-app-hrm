<?php
return [
	'select',
	'name'=>'education',
	'text'=>'学历',
	'attr_required'=>'true',
	'attr_class'=>'form-select',
	'validators'=>[['required']],
	'items'=>[
        1=>'初中','中职/高中','专科','本科','硕士','博士'
    ],
    'defaultValue'=>4,
];