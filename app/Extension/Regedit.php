<?php
/**
 * User: lnn
 * Date: 2018/1/20 0020
 * Time: 10:02
 */

namespace App\Extension;

class Regedit implements \ArrayAccess
{
    protected static $instance = null;

    private $container = [];

    protected static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function get($name)
    {
        return self::instance()[$name];
    }

    public static function set($name, $value)
    {
        self::instance()[$name] = $value;
    }

    public function offsetGet($offset)
    {
        if (isset($this->container[$offset])) {
            return $this->container[$offset];
        } else {
            $keyArr = explode('.', $offset);
            if (file_exists($path = __DIR__ . '/../../config/' . $keyArr[0] . '.php')) {
                $this->container[$keyArr[0]] = require $path;
                if (count($keyArr) > 1) {
                    $result = $this->container[$keyArr[0]];
                    for ($i = 1; $i < count($keyArr); $i ++) {
                        if (!isset($result[$keyArr[$i]])) return null;
                        $result = $result[$keyArr[$i]];
                    }
                    return $result;
                }
                return $this->container[$keyArr[0]];
            }
            return null;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetSet($offset, $value)
    {
        $this->container[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
}