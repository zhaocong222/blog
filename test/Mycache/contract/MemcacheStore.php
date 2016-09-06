<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-6
 * Time: 上午9:46
 */
namespace Mycache\contract;
use Mycache\contract\Store;

class MemcacheStore implements Store
{
    public function __construct()
    {
    }

    public function put($key, $value, $min = 0)
    {
        // TODO: Implement put() method.
    }

    public function get($key)
    {
        // TODO: Implement get() method.
    }
}