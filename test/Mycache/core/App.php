<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 下午4:27
 */
namespace Mycache\core;
use Mycache\facades\Facade;
use Mycache\Config as Con;

class App
{
    public $app = null;

    public $config = null;

    public function init(Con $config)
    {
        $this->register();
        $this->setConfig($config);
        return $this;
    }

    /*
     * 设置配置
     */
    private function setConfig($config)
    {
        $this->config = $config;
    }

    /*
     * 注册
     */
    protected function register()
    {
        foreach ($this->registerClass() as $key=>$val){
            //这里暂时简单点直接new ,后期改成注入到容器中
            $name = $this->binds()[$key];
            $this->app[$key] = new $name($this);
            class_alias($val,$key);
        }
    }

    /*
     * 注入到门面中
     */
    public function registerFacade()
    {
        Facade::setFacadeApplication($this->app);
        return $this;
    }

    private function binds()
    {
        return [
            'Cache'=>'\Mycache\contract\CacheManger'
        ];
    }

    private function registerClass()
    {
        return [
            'Cache'=>'\Mycache\facades\Cache'
        ];
    }

}