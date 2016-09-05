<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 下午4:20
 */
namespace Mycache\facades;

abstract class Facade
{
    protected static $app = [];

    protected static $resolvedInstance = [];

    protected static function getFacadeAccessor()
    {
        throw new \Exception('error: no getFacadeAccessor');
    }

    public static function getFacadeRoot()
    {
        return static::resolveFacadeInstance(ucwords(static::getFacadeAccessor()));
    }

    protected static function resolveFacadeInstance($name)
    {
        if (is_object($name)) {
            return $name;
        }

        if (isset(static::$resolvedInstance[$name])) {
            return static::$resolvedInstance[$name];
        }

        return static::$resolvedInstance[$name] = self::$app[$name];
    }

    public static function setFacadeApplication($app)
    {
        self::$app = $app;
    }

    public static function __callStatic($method, $args)
    {
        $instance = static::getFacadeRoot();

        if (is_null($instance))
            throw new \Exception(get_class($instance).' is error');

        call_user_func_array([$instance,$method],$args);
    }


}