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


//Cache::put('age','12',10);

//echo Cache::store('file')->get('age');
echo Cache::get('age');