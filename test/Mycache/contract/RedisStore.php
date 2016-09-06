<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-6
 * Time: 上午9:46
 */
namespace Mycache\contract;
use Mycache\contract\Store;

/*
 * 这个只是契约,真正的实现类在lib中
 */
class RedisStore implements Store
{
    public function __construct(\Mycache\lib\Redis $redis)
    {
        $this->redis = $redis;
    }

    public function put($key, $value, $min = 0)
    {
        $this->redis->put($key, $value, $min);
    }

    public function get($key)
    {
        return $this->redis->get($key);
    }
}