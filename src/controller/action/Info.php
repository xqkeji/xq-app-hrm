<?php
return [
    'edit',
    'modelName'=>'employee',
    'formName'=>'employee_info',
    'pickView'=>'info',
    'event'=>[
        'beforePost'=>function($action){
            return false;
        },
        'beforeRun'=>function($action){
            $controller=$action->getController();
            $user_id=$controller->auth->getAuthId($controller->getControllerName());
            if(!empty($user_id))
            {
                $controller->setActionParams([$user_id]);
            }
            else
            {
                throw new \Exception('获取不到当前的用户编号',500);
            }
        }
    ],
];