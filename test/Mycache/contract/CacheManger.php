<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 下午3:29
 */
namespace Mycache\contract;
use Mycache\contract\Store;
use Mycache\lib as lib;

class CacheManger extends Contract implements FactoryContract
{
    protected $stores = [];

    public function store($name = null)
    {
        $name = is_null($name) ? $this->getDefaultDriver() : $name;
        return isset($this->stores[$name]) ? $this->stores[$name] : $this->get($name);
    }

    private function get($name)
    {
        $config = $this->getConfig($name);

        if (is_null($config))
            throw new \Exception("Cache store [{$name}] is not defined.");

        $driveMethod = 'create'.ucwords($name).'Driver';
        if (method_exists($this,$driveMethod))
            return call_user_func([$this,$driveMethod],$config);
    }

    /*
     * 创建File缓存类
     */
    private function createFileDriver(array $config)
    {
        return $this->stores[$config['driver']] = new FileStore(new lib\File,$config['path']);
    }

    /*
     * 创建Redis缓存类
     */
    private function createRedisDriver(array $config)
    {
        return $this->stores[$config['driver']] = new RedisStore(new lib\Redis($config['connect']));
    }

    /*
     * 创建Memcache缓存类
     */
    private function createMemcacheDriver(array $config)
    {
        $this->stores[$config['driver']] = new MemcacheStore();

    }

    /*
     * 获取配置
     */
    private function getConfig($name)
    {
        return $this->app->config['stores'][$name];
    }

    /*
     * 通过配置获取
     */
    protected function getDefaultDriver()
    {
        return $this->app->config['drive'];
    }
    
    public function __call($method,$parameters)
    {
        return call_user_func_array([$this->store(),$method],$parameters);
    }

}