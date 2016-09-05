<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 上午9:09
 */
namespace App\Http\Controllers;

use Cache; //-> Illuminate\Support\Facades\Cache -> 代码:Illuminate\Foundation\AliasLoader load, 设置别名class_alias

use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    public function index()
    {
        Cache::store('redis')->put('xx', 'lemon', 10);
        echo Cache::get('xx');
        //Cache::put('key', 'lemon', 10);
        //echo Cache::get('key');
    }
}