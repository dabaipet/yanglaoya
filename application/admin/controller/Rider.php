<?php
/**
 * 骑手管理-后台
 * User: whp
 * Date: 2018/11/23
 * Time: 10:29
 */

namespace app\admin\controller;


class Rider extends Adminbase
{
    /*
     * 骑手列表
     * */
    public function index(){
        $this->assign('name', 'thinkphp');
        return $this->fetch();
    }
    /*
     * 骑手设置
     * */
    public function set(){
        $this->assign('name', 'thinkphp');
        return $this->fetch();
    }
    /*
     * 优惠券
     * */
    public function coupon(){
        $this->assign('name', 'thinkphp');
        return $this->fetch();
    }
    /*
     * 支付设置
     * */
    public function payment(){
        $this->assign('name', 'thinkphp');
        return $this->fetch();
    }
}