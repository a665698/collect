<?php
/**
 * User: lnn
 * Date: 2018/1/20 0020
 * Time: 16:08
 */

namespace App;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    private $model = null;

    public function __construct()
    {
        if (is_null($this->model)) {
            $capsule = new Manager;
            $param = \App\Extension\Regedit::get('database.connectionsa.mysql');
            var_dump($param);exit;
            $capsule->addConnection([
                'driver' => 'mysql',
                'host' => '121.40.52.21',
                'database' => 'iwebmall_dev',
                'username' => 'dev_user',
                'password' => '9xujqm',
                'charset' => 'utf8',
                'collation' => 'utf8_general_ci',
                'prefix' => 'imall_'
            ]);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
            $this->model = true;
        }
        if (is_null($this->table)) {
            $classArr = explode('\\', static::class);
            $this->table = end($classArr);
        }
        parent::__construct();
    }
}