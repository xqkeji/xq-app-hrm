<?php
/*
 * xqkeji.cn
 * @copyright 2023 新齐科技 (http://www.xqkeji.cn/)
 * @author 张文豪  <support@xqkeji.cn>
 */
namespace xqkeji\app\hrm\event;
use xqkeji\mvc\builder\Model;
use xqkeji\App;
class Attend 
{
	public static function beforeInsert($model)
	{
		$auth=App::getAuth();
		$flash=App::getFlash();
		$employee_id=$auth->getAuthId('employee');
		$attend=Model::getModel('attend');
        $hour=date('H');
		$datetime=strtotime(date('Y-m-d'));
		$model->setAttr('attend_datetime',$datetime);
		$period=$model->getAttr('period');
		$type=$model->getAttr('attend_type');
		$conditions=[
			['period','=',$period],
			['attend_type','=',$type],
			['attend_datetime','=',$datetime],
			['employee_id','=',$employee_id]
		];
		$exists=$attend->where($conditions)->find();
		if($exists)
		{
			$flash->error('您在该时间段已经有签到记录');
			return false;
		}
		else
		{
			if($period==1)
			{
				if($type==1)
				{
					if($hour>9)
					{
						$model->setAttr('attend_result','上午迟到');
					}
					else
					{
						$model->setAttr('attend_result','上午准时上班');
					}
				}
				else
				{
					if($hour<12)
					{
						$model->setAttr('attend_result','上午早退');
					}
					else
					{
						$model->setAttr('attend_result','上午正常下班');
					}
				}
			}
			else
			{
				if($type==1)
				{
					if($hour>14)
					{
						$model->setAttr('attend_result','下午迟到');
					}
					else
					{
						$model->setAttr('attend_result','下午准时上班');
					}
				}
				else
				{
					if($hour<18)
					{
						$model->setAttr('attend_result','下午早退');
					}
					else
					{
						$model->setAttr('attend_result','下午正常下班');
					}
				}
			}
		}
		
	}
	
}