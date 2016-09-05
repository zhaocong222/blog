<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 上午9:33
 */
namespace test;
class load
{
    public static function loader($class)
    {
        echo $class;
        exit();
    }
}

class_alias('\test\load', 'lo');