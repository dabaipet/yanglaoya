<?php
/**
 * 手机获取信息.
 * User: whp
 * Date: 2018/10/24
 * Time: 19:44
 */

namespace app\api\controller;
use app\index\model\Phone;

class PhoneInfo extends Apibase
{
    /*
         * 获取手机信息
         * @param   uid
         * @param   IMEI
         * @param   mac
         * @param   ip
         * @param   system
         * */
    public function index()
    {
        $phone = new Phone();
        $phone->uid =   $this->uid;
        $phone->imei =   $this->request->param('imei');
        $phone->mac =   $this->request->param('mac');
        $phone->ip =   $this->request->param('ip');
        $phone->system =   $this->request->param('system');
        $phone->save();
        //无需返回数据 直接存储
    }
}