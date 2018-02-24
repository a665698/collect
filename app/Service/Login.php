<?php
/**
 * User: lnn
 * Date: 2018/1/19 0019
 * Time: 17:23
 */

namespace App\Service;

use App\Service;
use App\Extension\Session;

class Login extends Service
{
    /**
     * 判断是否登录
     * @author lnn
     */
    public static function isRegister()
    {
        $token = Session::getLogin();
        if (empty($token)) {
            return false;
        } else {
            return true;
        }
    }
}