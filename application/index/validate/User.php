<?php
namespace app\api\validate;
/**
 * 注册用户验证器.
 * User: whp
 * Date: 2018/10/19
 * Time: 16:28
 */
use think\Validate;

class User extends Validate
{
    //规则
    protected $rule =   [
        'phone'  => 'require|mobile|max:11|length:11',
        'code'   => 'require|number|max:4|length:4',
        'identity'   => 'require|number|length:1|in:1,2,3,4',
        'uid'   => 'require|number',
        'apptoken'   => 'require',
    ];
    //提示信息
    protected $message  =   [
        'phone.require' => '请输入手机号',
        'phone.mobile'     => '请输入正确手机号',
        'phone.max'     => '请输入正确手机号',
        'phone.length'     => '请输入正确手机号',

        'code.require'   => '请输入验证码',
        'code.number'   => '请输入正确验证码',
        'code.max'   => '请输入正确验证码',
        'code.length'     => '请输入正确验证码',

        'identity.require'   => '请选择注册身份',
        'identity.number'   => '参数错误',
        'identity.length'     => '参数错误',
        'identity.in'     => '参数错误',

        'apptoken.require'     => '参数错误',
    ];
    //场景
    protected $scene = [
        'signin'  =>  ['phone','code'],
        'choice'  =>  ['identity'],
        'action'  =>  ['uid','apptoken']
    ];

}