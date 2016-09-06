<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-6
 * Time: 上午9:46
 */
namespace Mycache\contract;

interface Store
{
    public function get($key);
    
    public function put($key,$value,$min);

}