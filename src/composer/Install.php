<?php
namespace xqkeji\app\hrm\composer;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Command;
use MongoDB\Driver\BulkWrite;
use MongoDB\BSON\ObjectId;
class Install
{
    public static function getRootPath():string
    {
        return dirname(__DIR__,5);
    }
    public static function getRootConfigPath():string
    {
        return dirname(__DIR__,5).DIRECTORY_SEPARATOR.'config';
    }
    public static function postInstall() : void
    {
        $configPath=self::getRootConfigPath();
        $containerFile=$configPath.DIRECTORY_SEPARATOR.'container.php';

        if(is_file($containerFile))
        {
            $config=include($containerFile);
            if(isset($config['db']))
            {
                $db=$config['db'];
                $hostname=$db['hostname'] ?? '';
                $hostport=$db['hostport'] ?? '';
                $database=$db['database'] ?? '';
                $username=$db['username'] ?? '';
                $password=$db['password'] ?? '';
                if(!empty($username))
                {
                    $uri='mongodb://'.$username.':'.$password.'@'.$hostname.':'.$hostport;
                }
                else
                {
                    $uri='mongodb://'.$hostname.':'.$hostport;
                }
                $mustInsert=true;
                $manager = new Manager($uri,['serverSelectionTryOnce'=>false,'serverSelectionTimeoutMS'=>500,'connectTimeoutMS'=>500]);
                $cmd = new Command([
                    'count' => 'hrm_department'
                ]);
                $result=$manager->executeCommand($database, $cmd)->toArray();
                if (!empty($result)) {
                    $count = intval($result[0]->n);
                    if($count>0)
                    {
                        $mustInsert=false;
                    }
                }
                if($mustInsert)
                {
                    $bulk = new BulkWrite();
                    $type=[
                        'name'=>'软件开发部',
                        'desc'=>'软件开发部',
                        'status'=>1,
                        'ordernum'=>1,
                        'create_time'=>time(),
                        'update_time'=>time(),
                    ];
                    $bulk->insert($type);
                    $type=[
                        'name'=>'行政管理部',
                        'desc'=>'行政管理部',
                        'status'=>1,
                        'ordernum'=>2,
                        'create_time'=>time(),
                        'update_time'=>time(),
                    ];
                    $bulk->insert($type);
                    
                    $manager->executeBulkWrite($database.'.hrm_department', $bulk); 
                    echo "初始化部门成功！\r\n";
                }
                $mustInsert=true;
                $cmd = new Command([
                    'count' => 'hrm_position'
                ]);
                $result=$manager->executeCommand($database, $cmd)->toArray();
                if (!empty($result)) {
                    $count = intval($result[0]->n);
                    if($count>0)
                    {
                        $mustInsert=false;
                    }
                }
                if($mustInsert)
                {
                    $bulk = new BulkWrite();
                    $type=[
                        'name'=>'PHP开发工程师',
                        'desc'=>'PHP开发工程师',
                        'status'=>1,
                        'ordernum'=>1,
                        'create_time'=>time(),
                        'update_time'=>time(),
                    ];
                    $bulk->insert($type);
                    $type=[
                        'name'=>'前端开发工程师',
                        'desc'=>'前端开发工程师',
                        'status'=>1,
                        'ordernum'=>2,
                        'create_time'=>time(),
                        'update_time'=>time(),
                    ];
                    $bulk->insert($type);
                    
                    $manager->executeBulkWrite($database.'.hrm_position', $bulk); 
                    echo "初始化职位成功！\r\n";
                }
                //创建员工唯一索引
                $cmd = new Command([
                    // 集合名
                    'createIndexes' => 'hrm_employee',
                    'indexes' => [
                        [
                            // 索引名
                            'name' => 'hrm_employee_unique',
                            // 索引字段数组
                            'key' => [
                                'username' => 1
                            ],
                            'unique'=>true,
                        ],
                    ],
                ]);
                $result = $manager->executeCommand($database, $cmd)->toArray();
                if (!empty($result)) {
                    $ok = intval($result[0]->ok);
                    if($ok>0)
                    {
                        echo "创建员工集合username字段唯一索引成功！\r\n";
                    }
                    else
                    {
                        echo "创建员工集合username字段唯一索引失败！\r\n";
                    }
                }
                //创建索引结束
                //创建签到唯一索引
                $cmd = new Command([
                    // 集合名
                    'createIndexes' => 'hrm_attend',
                    'indexes' => [
                        [
                            // 索引名
                            'name' => 'hrm_attend_unique',
                            // 索引字段数组
                            'key' => [
                                'period' => 1,
                                'attend_type' => 1,
                                'attend_datetime' => 1,
                                'employee_id' => 1,
                            ],
                            'unique'=>true,
                        ],
                    ],
                ]);
                $result = $manager->executeCommand($database, $cmd)->toArray();
                if (!empty($result)) {
                    $ok = intval($result[0]->ok);
                    if($ok>0)
                    {
                        echo "创建签到集合唯一索引成功！\r\n";
                    }
                    else
                    {
                        echo "创建签到集合唯一索引失败！\r\n";
                    }
                }
                //创建索引结束
                //创建签到唯一索引
                $cmd = new Command([
                    // 集合名
                    'createIndexes' => 'hrm_wages',
                    'indexes' => [
                        [
                            // 索引名
                            'name' => 'hrm_wages_unique',
                            // 索引字段数组
                            'key' => [
                                'employee_id' => 1,
                                'wages_month' => 1,
                            ],
                            'unique'=>true,
                        ],
                    ],
                ]);
                $result = $manager->executeCommand($database, $cmd)->toArray();
                if (!empty($result)) {
                    $ok = intval($result[0]->ok);
                    if($ok>0)
                    {
                        echo "创建工资记录集合唯一索引成功！\r\n";
                    }
                    else
                    {
                        echo "创建工资记录集合唯一索引失败！\r\n";
                    }
                }
                //创建索引结束
            }
            else
            {
                throw new \Exception("the config file:\"$containerFile\" can not found 'db' config!" , 404);
            }
        }
        else
        {
            throw new \Exception("the config file:\"$containerFile\" not exists!" , 404);
        }
    }
    
}