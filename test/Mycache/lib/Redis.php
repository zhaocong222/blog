<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-6
 * Time: 上午9:59
 */
namespace Mycache\lib;

class Redis
{
    private $redis;

    public function __construct($config){
        $this->redis = new \Redis();
        $this->redis->connect($config['host'],$config['port']);
        return $this;
    }


    public function put($key, $value, $min)
    {
        $this->redis->setex($key,$min,$value);
    }

    public function get($key)
    {
        return $this->redis->get($key);
    }
}