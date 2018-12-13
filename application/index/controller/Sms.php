<?php
/**
 *-------------LeSongya--------------
 * Explain: 短信控制器
 * File name: Sms.php
 * Date: 2018/11/30
 * Author: 王海鹏
 * Project name: 乐送呀
 *-----------------------------------
 * @funcation   send
 */
namespace app\api\controller;

use app\common\model\Alisms;

class Sms extends Apibase
{
    /**
     * 发送短信
     * @param $PhoneNumbers 手机号
     * @param   $CodeType   发送场景
     */
    public function send($PhoneNumbers,$CodeType) {
        switch ($CodeType){
            case    'identity'://身份验证
                $TemplateCode   =   'SMS_151450696';
                break;
            case    'signin'://登录
                $TemplateCode   =   'SMS_151450695';
                break;
            case    'register'://注册
                $TemplateCode   =   'SMS_151450693';
                break;
            case    'password'://修改密码
                $TemplateCode   =   'SMS_151450692';
                break;
            case    'information'://信息变更
                $TemplateCode   =   'SMS_151450691';
                break;
            default:
                $TemplateCode   =   'SMS_151450694';
                break;
        }
        $AliSms =   new Alisms();
        $result =   $AliSms -> sendSms($PhoneNumbers,$TemplateCode);
        if ($result == true){
            return json(['code' => 200,'msg' => showReturnCode('3000')]);
        }
    }

}