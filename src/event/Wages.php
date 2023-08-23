<?php
/*
 * xqkeji.cn
 * @copyright 2023 新齐科技 (http://www.xqkeji.cn/)
 * @author 张文豪  <support@xqkeji.cn>
 */
namespace xqkeji\app\hrm\event;
use xqkeji\mvc\builder\Model;
use xqkeji\App;
class Wages 
{
	public static function beforeWrite($model)
	{
        $base_wages=$model->base_wages;
        $performance_wages=$model->performance_wages;
		$other_wages=$model->other_wages;
        $attend_wages=$model->attend_wages;

        $total_wages=$base_wages+$performance_wages+$attend_wages+$other_wages;
		$model->total_wages=$total_wages;
	}
	public static function beforeInsert($model)
	{
        $auth=App::getAuth();
		$flash=App::getFlash();
		$employee_id=$model->getAttr('employee_id');
		$wages_month=$model->getAttr('wages_month');
		$wages=Model::getModel('wages');
		$conditions=[
			['employee_id','=',$employee_id],
			['wages_month','=',$wages_month],
		];
		$exists=$wages->where($conditions)->count();
		if($exists)
		{
			$flash->error('已经存在一条该员工的月工资记录');
			return false;
		}
		else
		{
			return true;
		}
	}
}