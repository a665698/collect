<?php
/**
 * User: lnn
 * Date: 2018/1/19 0019
 * Time: 17:23
 */

namespace App;

use App\Extension\Regedit;

class Service
{
    /**
     * 设置注册表
     * @author lnn
     * @param string $name 注册表标识
     * @return mixed|null
     */
    protected function regeditGet($name)
    {
        return Regedit::get($name);
    }

    /**
     * 获取注册表信息
     * @author lnn
     * @param string $name 注册表标识
     * @param mixed $value 值
     */
    protected function regeditSet($name, $value)
    {
        Regedit::set($name, $value);
    }
}