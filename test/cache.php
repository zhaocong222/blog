<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 上午9:36
 */
namespace test;
use test\cache\a as b;



require './load.php';

//load.php 里 class_alias('\test\load', 'lo');
spl_autoload_register('lo::loader');


new b();
