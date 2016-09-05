<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 下午2:36
 */
namespace Mycache;
use Cache;


define('base_path',__DIR__);

require './App.php';


Cache::put('user','name');