<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 下午4:04
 */
namespace Mycache;

class Config implements \ArrayAccess
{
    private $configs = [];

    public function __construct()
    {
        $this->configs = require './config/cache.php';
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        if (!isset($this->configs[$offset]))
            throw new \Exception('cache drive is must.');
        return $this->configs[$offset];
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}