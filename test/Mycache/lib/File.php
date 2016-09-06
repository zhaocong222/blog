<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-6
 * Time: 上午9:59
 */
namespace Mycache\lib;

class File
{
    public function put($key, $value)
    {
        file_put_contents($key,$value,LOCK_EX);
    }


    public function get($key)
    {
        return file_get_contents($key);
    }
}