<?php
/**
 * User: lnn
 * Date: 2018/1/22 0022
 * Time: 11:00
 */

namespace App\Extension;

class common
{
    public static function think_md5($str, $key = 'YinZi')
    {
        return '' === $str ? '' : md5(sha1($str) . $key);
    }
}