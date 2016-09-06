<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-6
 * Time: 上午9:46
 */
namespace Mycache\contract;
use Mycache\contract\Store;
use Mycache\lib\File as File;

/*
 * 这个只是契约,真正的实现类在lib中
 */
class FileStore implements Store
{
    protected $file;
    
    protected $path;


    public function __construct(File $file,$path)
    {
        $this->file = $file;
        $this->path = $path;
    }


    public function put($key, $value, $min = 0)
    {
        //设置时间
        $min = $this->setMin($min);
        $file = $this->path.md5($key);
        $this->file->put($file, serialize($value));
    }

    private function setMin($min)
    {
        //过期时间
        $min = time() + $min * 60;

        if ($min == 0) {
            return ;
        }else{
            return (int) $min;
        }

    }


    public function get($key)
    {
        $file = $this->path.md5($key);
        return unserialize($this->file->get($file));
    }
}