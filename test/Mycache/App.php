<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 下午4:16
 */
namespace Mycache;

require './Load.php';
spl_autoload_register("AutoLoad::loader");

$app = new core\App();
$app->init()->registerFacade();