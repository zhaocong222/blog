<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 下午3:29
 */
namespace Mycache\contract;

class CacheManger implements FactoryContract
{
    private $app = null;
    
    protected $stores = [];

    public function store($name = null)
    {
        $name = is_null($name) ? $this->getDefaultDriver() : $name;
        return isset($this->stores[$name]) ? $this->stores[$name] : $this->get($name);
    }

    private function get($name)
    {
        
    }

    /*
     * 通过配置获取
     */
    protected function getDefaultDriver()
    {
    }
    
    public function __call($method,$parameters)
    {
        return call_user_func_array([$this->store(),$method],$parameters);
    }

}