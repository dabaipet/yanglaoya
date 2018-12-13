<?php
/**
 * 身份证和银行卡.
 * User: whp
 * Date: 2018/10/24
 * Time: 20:35
 * -------------------------
 * @Note    银行卡信息暂时不用 可先做微信账号绑定（考虑到公司微信账户转账到银行卡手续费）
 * @funcation  idCard   身份证信息
 * @funcation   idCardSave  身份证提交数据
 *
 */
namespace app\api\controller;

use app\api\model\Bankcard;
use app\api\model\Idcard;

class Card extends Apibase
{
    /*
     * 身份证
     * */
    public function idCard()
    {
        $idCard = new Idcard();
        $idCardData = $idCard->where('uid', $this->uid)->find();
        return ['datainfo' => $idCardData];
    }

    /*
     * 身份证保存信息
     * */
    public function idCardSave()
    {
        $idCardId = $this->request->param('cardid');

    }

    /*
     * 银行卡
     * */
    public function bank()
    {
        $bank = new Bankcard();
        $bankData = $bank -> where('uid',$this->uid)->find();
        return json(['bankdata'=>$bankData]);
    }

    /*
     * 银行卡保存信息
     * */
    public function bankSave()
    {
        $id = $this->request->param('id');
        $number = $this->request->param('number');
        $bank = new Bankcard();
        //$bankData = $bank -> where(['id'=>$id,'uid' => $this->uid])->update($data);
        $bank->number = $number;
        return json(['code' => 200,'bankdata'=>showReturnCode('1001')]);
    }

    /*
     * 微信账户 微信登录自动获取
     * */
    public function wxAccount()
    {

    }


}