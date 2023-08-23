<?php
return [
	
	//类名称可以省略当前的模块名称，例如model\模型类名称、form\表单类名称等
	'model\wages'=>[
		'beforeWrite'=>'Wages',//程序文件需要放在event目录下。
		'beforeInsert'=>'Wages',
	],
	'model\attend'=>[
		'beforeInsert'=>'Attend',
	],
    
];