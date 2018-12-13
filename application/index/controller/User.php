<?php
/**
 *-------------LeSongya--------------
 * Explain: 用户控制器
 * File name: User.php
 * Date: 2018/12/5
 * Author: 王海鹏
 * Project name: 乐送呀
 *------------------------------------
 */

namespace app\api\controller;

use app\common\model\PropertyGps;
use app\common\model\User as UserM;
use app\common\model\Wallet;
use app\common\model\Order;
use think\facade\Cache;
use think\facade\Session;

class User extends Apibase
{
    /*
     * 基本信息
     * @params  user表    头像 手机号 分数 金额 我的订单数
     * @params  wallet表  钱包余额
     * @params  order表  订单数
     * */
    public function index()
    {
        $user = new UserM();
        $userResult = $user->getRiderInfo($this->token);
        Cache::store('redis')->set($this->uid, $userResult);
        $order = new Order();
        $orderResult = $order->getOrderNumber($this->uid, $this->identity);
        $wallet = new Wallet();
        $walletMoney = $wallet->getWalletNum($this->uid);
        $money = empty($walletMoney) ? 0 : $walletMoney->give_m + $walletMoney->recharge_m;
        return json(['code' => 200, 'phone' => $userResult->phone, 'order' => $orderResult, 'wallet' => $money,]);
    }

    /*
     * 个人信息
     * @param   uid
     * @return  头像  姓名  是否实名认证 手机号  性别  （微信 QQ） 是否绑定
     * */
    public function info()
    {
        $user = Cache::store('redis')->remember('user' . $this->phone, json_encode(UserM::get($this->uid)));
        return json(['code' => 200, 'user' => $user]);
    }

    /*
     * 物业设置存放点信息
     * */
    public function setDeposit()
    {
        $name = $this->request->param('name');
        $lat = $this->request->param('lat');
        $long = $this->request->param('long');
        $property = new PropertyGps();
        $property->save(['uid' => $this->uid,'name' => $name,'lat' => $lat, 'long' => $long]);

    }

    /*
     * 获取GPS 返回 方圆3公里所有站点
     * */
    public function getGps()
    {
        $lng = $this->request->param('lng');
        $lat = $this->request->param('lat');
    }

    /*
     * 头像设置
     * */
    public function setHeadpic()
    {

    }

    /*
     * 用户选择身份
     * @param   identity    身份标识 1骑手 2快递 3物业 4个人
     * */
    public function choice()
    {
        $identity = $this->request->param('identity');
        $result = $this->validate(['identity' => $identity], 'app\api\validate\User.choice');
        if (true !== $result) {
            return json(['code' => '202', 'msg' => $result]);
        }
        $UserInfo = new UserM();
        $UserInfoResult = $UserInfo->allowField('identity')->save(['identity' => $identity], ['uid' => $this->uid]);
        if ($UserInfoResult == true) {
            Session::set('identity' . $this->uid, $identity);
            return json(['code' => '200', 'turl' => url('/location'), 'msg' => showReturnCode('1020')]);
        }
    }
    /*
     * 绑定微信
     * */
    public function wechat(){

    }

}