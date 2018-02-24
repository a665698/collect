<?php
/**
 * User: lnn
 * Date: 2018/1/20 0020
 * Time: 15:50
 * command 用户逻辑类
 */

namespace App\Service;

use App\Service;
use App\Model\Admin;
use App\Extension\Common;

class User extends Service
{
    public function checkPwd()
    {
        $info = Admin::where('uid', 1)->first()->hasOneAdminNode()->first();
        var_dump($info);exit;
        if (empty($info->uid)) {
            return false;
        } else {
            echo 22;
        }
    }
}