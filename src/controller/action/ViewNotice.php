<?php
return [
    'edit',
    'modelName'=>'notice',
    'formName'=>'employee_notice',
    'pickView'=>'edit',
    'event'=>[
        'beforePost'=>function($action){
            return false;
        },
        
    ],
];