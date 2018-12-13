<?php
namespace app\api\http;
/**
 * Created by PhpStorm.
 * User: max
 * Date: 2018/11/27
 * Time: 17:11
 */
use think\worker\Server;

class Worker extends Server
{
    protected $socket = 'http://0.0.0.0:2346';

    public function onMessage($connection,$data)
    {
        $connection->send(json_encode($data));
    }
}