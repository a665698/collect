<?php
/**
 * User: lnn
 * Date: 2018/1/20 0020
 * Time: 09:54
 */

namespace App\Extension;


class Session
{
    private static $login = 'token';

    /**
     * 获取登录SESSION
     * @author lnn
     * @return string
     */
    public static function getLogin()
    {
        return $_SESSION[self::$login] ?? '';
    }

    /**
     * 设置登录SESSION
     * @author lnn
     * @param $value
     */
    public static function setLogin($value)
    {
        $_SESSION[self::$login] = $value;
    }
}