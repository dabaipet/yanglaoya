<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/12
 * Time: 23:56
 */

namespace app\api\validate;


use think\Validate;

class Order extends Validate
{
    //规则
    protected $rule =   [
        'id'   => 'require|number',
    ];
    //提示信息
    protected $message  =   [

    ];
    //场景
    protected $scene = [
        'view'  =>  ['id'],
    ];
}