<?php
/**
 * 订单中心.
 * User: whp
 * Date: 2018/10/24
 * Time: 16:15
 */

namespace app\api\controller;

use app\common\model\Order as OrderM;
use think\facade\Cache;

class Order extends Apibase
{
    /*
     *订单列表
     * @return  public  时间 状态 地址信息
     * @return  下单人 昵称 手机号
     * @return  接单人 手机号
     * */
    public function index()
    {
        $order = new OrderM();
        $orderResult = $order->getOrder($this->uid, $this->identity);
        return json(['code' => 200, 'order' => $orderResult]);
    }

    /*
     * 订单详情
     * */
    public function view()
    {
        $id = $this->request->param('id');
        $msg = $this->validate(['id' => $id], 'app\api\validate\Order.view');
        if (true !== $msg) {
            return json(['code' => '202', 'msg' => $msg]);
        }
        if (Cache::store('redis')->has('order'.$id)){
            $order = new OrderM();
            $orderView = $order->getOrderView($id,$this->uid);
            Cache::store('redis')->set('order'.$id);
            return json(['code' => 200, 'vieew' => $orderView]);
        }
        return json(['code' => 200, 'view' =>Cache::store('redis')->get('order'.$id)]);
    }
    /*
     *
     * */
}