<?php
/**
 *-------------LeSongya--------------
 * Explain:
 * File name: Order.php
 * Date: 2018/12/6
 * Author: 王海鹏
 * Project name: 乐送呀
 *-----------------------------------------
 */

namespace app\common\model;


use think\Model;

class Order extends Model
{

    /*
     * 类别 1骑手 2快递 3物业 4个人
     * */
    /*
     * 订单数量
     * @param   UID 用户UID
     * @param   identity    用户身份标识
     * @return  数量
     * */
    public function getOrderNumber($uid,$identity){
        return $this->where(['uid' => $uid,'is_cate' => $identity])
            ->count('id');
    }
    /*
     *
     * */
    public function getOrderView($id,$uid){
        return $this->where(['id' => $id, 'uid' => $uid])
            ->field(true)
            ->find();
    }
    /*
     * 订单信息
     * */
    public function getOrder($uid,$identity){
        return $this->where(['uid' => $uid,'is_cate' => $identity])
            ->field(true)
            ->find();
    }
}