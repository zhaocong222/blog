<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 下午4:27
 */
namespace Mycache\core;
use Mycache\facades\Facade;

class App
{
    protected static $app = [];

    public function init()
    {
        $this->register();
        return $this;
    }

    /*
     * 注册
     */
    protected function register()
    {
        foreach ($this->registerClass() as $key=>$val){
            //这里暂时简单点直接new ,后期改成注入到容器中
            $name = $this->binds()[$key];
            self::$app[$key] = new $name;
            class_alias($val,$key);
        }
    }

    /*
     * 注入到门面中
     */
    public function registerFacade()
    {
        Facade::setFacadeApplication(self::$app);
        return $this;
    }

    private function binds()
    {
        return [
            'Cache'=>'\Mycache\contract\CacheManger',
        ];
    }

    private function registerClass()
    {
        return [
            'Cache'=>'\Mycache\facades\Cache'
        ];
    }

}