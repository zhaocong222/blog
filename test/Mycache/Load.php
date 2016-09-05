<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 下午2:37
 */
namespace Mycache;


class Load
{
    public static function loader($class)
    {
        $file = str_replace('\\','/', dirname(__DIR__).DIRECTORY_SEPARATOR.ltrim($class,'/\\'));
        $_file = $file.'.php';

        if (is_file($_file))
            include_once $_file;
    }
}

class_alias('\Mycache\Load','AutoLoad');