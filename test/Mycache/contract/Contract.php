<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-6
 * Time: 上午9:15
 */
namespace Mycache\contract;

abstract class Contract
{
    protected $app = null;

    public function __construct(\Mycache\core\App $app)
    {
        $this->app = $app;
    }
}